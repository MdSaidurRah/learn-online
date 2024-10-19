<?php


namespace App\Http\Controllers\People;

use App\Http\Controllers\Controller;
use App\Models\CommitteeMembers;
use Illuminate\Support\Facades\Crypt;
use App\LibraryFunctions\accesslogger;
use App\LibraryFunctions\crudlib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class CommitteeMembersController extends Controller
{
    public $accessLogger;
    public $crudObject;


    public function __construct()
    {
        $this->accessLogger=new accesslogger();
        $this->crudObject=new crudlib();
        $this->middleware('checkPermission');
    }


    public function index()
    {
        return view('people.CommitteeMembers.committeemembers-all');
    }


    public function create()
    {
        $committee =  DB::table('adminunit')->select('id','adminUnitName')->where('adminUnitCategory','General Committee')->where('adminunitStatus','ACTIVE')->get();
        $people = DB::table('people')->select('id','fullName')->where('peopleCategory','Committee Member')->where('peopleStatus','ACTIVE')->get();

        return view('people.CommitteeMembers.committeemembers-add')
            ->with('committee',$committee)
            ->with('people',$people);
    }


    public function store(Request $request)
    {
        $userId=Session::get('userId');
        $request->request->add(['createdBy'=>$userId]);

        if($request->committeeId)
        {
            $committee = DB::table('adminunit')->select('adminUnitName')->where('id',$request->committeeId)->get();
            $request->request->add(['committeeName' =>$committee[0]->adminUnitName]);
        }

        if($request->memberPeopleId)
        {
            $people = DB::table('people')->select('fullName')->where('id',$request->memberPeopleId)->get();
            $request->request->add(['memberPeopleName' =>$people[0]->fullName]);
        }


        $inputFormData=$request->except('_token');
        $committeemembers=$this->crudObject->create(new CommitteeMembers(),$inputFormData);
        if($committeemembers)
        {
            $this->accessLogger->logEntry($userId,'News submit.','News content','','');
            flash()->addSuccess('Add operation has been successful.');
            return Redirect::back();
        }else
        {
            flash()->addError('Sorry, Add operation has been failed.');
            return Redirect::back();
        }
    }

    public function show($id)
    {
        $keyId = Crypt::decryptString($id);
        $committeemembers=DB::table('committeemembers')->select('*')->where('id',$keyId)->get();
        return view('people.CommitteeMembers.committeemembers-show')
            ->with('committeemembers',$committeemembers);
    }


    public function edit($id)
    {
        $keyId = Crypt::decryptString($id);
        $committeemembers=DB::table('committeemembers')->select('*')->where('id',$keyId)->get();

        $committee =  DB::table('adminunit')->select('id','adminUnitName')->where('adminUnitCategory','General Committee')->where('adminunitStatus','ACTIVE')->get();
        $people = DB::table('people')->select('id','fullName')->where('peopleCategory','Committee Member')->where('peopleStatus','ACTIVE')->get();

        return view('people.CommitteeMembers.committeemembers-edit')
            ->with('committee',$committee)
            ->with('people',$people)
            ->with('committeemembers',$committeemembers);
    }


    public function update(Request $request)
    {
        $userId=Session::get('userId');
        $request->request->add(['updatedBy'=>$userId]);

        if($request->committeeId)
        {
            $committee = DB::table('adminunit')->select('adminUnitName')->where('id',$request->committeeId)->get();
            $request->request->add(['committeeName' =>$committee[0]->adminUnitName]);
        }

        if($request->memberPeopleId)
        {
            $people = DB::table('people')->select('fullName')->where('id',$request->memberPeopleId)->get();
            $request->request->add(['memberPeopleName' =>$people[0]->fullName]);
        }

        $inputFormData=$request->except('_token','id','submit');
        $committeemembers=$this->crudObject->update(new CommitteeMembers(),$inputFormData,'id',$request->id);
        if($committeemembers)
        {
            $this->accessLogger->logEntry($userId,'News Update.','News content','','');
            flash()->addSuccess('Update operation has been successful.');
            return Redirect::back();
        }else
        {
            flash()->addError('Sorry, Update operation has been failed .');
            return Redirect::back();
        }
    }


    public function getAllItems(Request $request)
    {
        $committeemembers=DB::table('committeemembers')->select(['*'])->orderBy('id','DESC')->get();
        return datatables()->of($committeemembers)
            ->addIndexColumn()
            ->addColumn('action',function($committeemembers)
            {
                $btn1='<a href="'.'/people/committeemembers/show/'. Crypt::encryptString($committeemembers->id).'" class="edit btn btn-success btn-sm"><i class="fa fa-file-text-o" aria-hidden="true"></i> Show</a> ';
                $btn2='<a href="'.'/people/committeemembers/edit/'. Crypt::encryptString($committeemembers->id).'" class="edit btn btn-warning btn-sm"><i class="fa fa-file-text-o" aria-hidden="true"></i> Edit</a> ';

                return $btn1.$btn2;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

}
