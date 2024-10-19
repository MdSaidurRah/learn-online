<?php


namespace App\Http\Controllers\People;

use App\Http\Controllers\Controller;
use App\LibraryFunctions\imagelib;
use App\Models\People;
use App\Models\Systemuser;
use Illuminate\Support\Facades\Crypt;
use App\LibraryFunctions\accesslogger;
use App\LibraryFunctions\crudlib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PeopleController extends Controller
{
    public $accessLogger;
    public $crudObject;
    public $imageObject;


    public function __construct()
    {
        $this->accessLogger=new accesslogger();
        $this->crudObject=new crudlib();

        $this->imageObject = new imagelib();
        $this->middleware('checkPermission');
    }


    public function index()
    {
        $adminStaff = DB::table('people')->where('peopleCategory','Admin Staff')->where('peopleStatus','ACTIVE')->count();
        $facultyMember = DB::table('people')->where('peopleCategory','Faculty Member')->where('peopleStatus','ACTIVE')->count();
        $alumni = DB::table('people')->where('peopleCategory','ALUMNI')->where('peopleStatus','ACTIVE')->count();
        $visitor = DB::table('people')->where('peopleCategory','VISITOR')->where('peopleStatus','ACTIVE')->count();
        $keyPerson = DB::table('people')->where('peopleCategory','Key Person')->where('peopleStatus','ACTIVE')->count();
        $registeredPeople = DB::table('people')->where('peopleStatus','ACTIVE')->count();

        return view('people.people-all')
            ->with('adminStaff',$adminStaff)
            ->with('facultyMember',$facultyMember)
            ->with('registeredPeople',$registeredPeople)
            ->with('keyPerson',$keyPerson)
            ->with('visitor',$visitor)
            ->with('alumni',$alumni);
    }


    public function create()
    {
        $faculty =DB::table('faculty')->select('id','shortName','fullName')->where('status','ACTIVE')->get();
        return view('people.people-add')
            ->with('faculty',$faculty );
    }

    public function store(Request $request)
    {
        $userId=Session::get('userId');
        $request->request->add(['createdBy'=>$userId]);

        if($request->peoplePhoto)
        {
            $uploadedPath = '';
            $storagePath = '';
            $parent = '';

            $peopleCategory = $request->peopleCategory;
            if($peopleCategory=="Faculty Member")
            {
                $uploadedPath = 'uploads/images/peoples/Faculty Member/';
                $storagePath = 'uploads/images/peoples/Faculty Member/';
                $parent = "Faculty Member";
            }elseif($peopleCategory=="Admin Staff")
            {
                $uploadedPath = 'uploads/images/peoples/Admin Staff/';
                $storagePath = 'uploads/images/peoples/Admin Staff/';
                $parent = "Admin Staff";
            }elseif($peopleCategory=="Committee Member")
            {
                $uploadedPath = 'uploads/images/peoples/Committee Member/';
                $storagePath = 'uploads/images/peoples/Committee Member/';
                $parent = "Committee Member";
            }elseif($peopleCategory=="Visitor")
            {
                $uploadedPath = 'uploads/images/peoples/Visitor/';
                $storagePath = 'uploads/images/peoples/Visitor/';
                $parent = "Visitor";
            }elseif($peopleCategory=="Alumni")
            {
                $uploadedPath = 'uploads/images/peoples/Alumni/';
                $storagePath = 'uploads/images/peoples/Alumni/';
                $parent = "Alumni";
            }elseif($peopleCategory=="Key Person")
            {
                $uploadedPath = 'uploads/images/peoples/Key Person/';
                $storagePath = 'uploads/images/peoples/Key Person/';
                $parent = "Key Person";
            }elseif($peopleCategory=="System User")
            {
                $uploadedPath = 'uploads/images/peoples/System User/';
                $storagePath = 'uploads/images/peoples/System User/';
                $parent = "System User";
            }
            $photoUrl = $this->imageObject->photoUpload($request,'peoplePhoto',$uploadedPath,$storagePath,$parent,$userId);
            $request->request->add(['photo' =>$photoUrl]);
        }

        $request->request->add(['slugTitle' => Str::slug($request->fullName )]);

        $inputFormData=$request->except('_token','peoplePhoto');
        $people=$this->crudObject->create(new People(),$inputFormData);
        if($people)
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

    public function addAsUser($id)
    {
        $userId = Session::get('userId');
        $keyId = Crypt::decryptString($id);
        $people=DB::table('people')->select('*')->where('id',$keyId)->get();


        $userData = array(
            'officialName'=>$people[0]->fullName,
            'userEmail'=>$people[0]->email,
            'userContactNo'=>$people[0]->contactNo,
            'userPassword'=>   md5('asdf'),
            'userRole'=>'Faculty Member',
            'department_id'=>$people[0]->department_id,
            'department'=>$people[0]->departmentName,
            'designation'=>$people[0]->designation,
            'userStatus'=>"ACTIVE",
            'systemUniqueId'=>$people[0]->id,
            'createdBy'=>$userId
        );

        $userAdd  = $this->crudObject->create(new Systemuser(),$userData);
        if($userAdd)
        {
            $this->accessLogger->logEntry(0,"New User create in system Admin","System",'','');
            flash()
                ->option('timeout', 6000)
                ->addSuccess('New User Added successfully.');
        }else
        {
            flash()
                ->option('timeout', 6000)
                ->addError('Sorry, New User added successfully failed.');
        }

        return redirect()->route('show-people', ['id' => Crypt::encryptString($people[0]->id)]);
    }



  public function show($id)
    {
        $keyId = Crypt::decryptString($id);
        $people=DB::table('people')->select('*')->where('id',$keyId)->get();

        $userExist =  DB::table('users')->where('systemUniqueId',$people[0]->id)->count();

        return view('people.people-view')
            ->with('userExist',$userExist)
            ->with('people',$people);
    }


    public function edit($id)
    {
        $keyId = Crypt::decryptString($id);
        $people=DB::table('people')->select('*')->where('id',$keyId)->get();

        $committee =DB::table('adminunit')
            ->select('id','adminUnitName')
            ->where('adminUnitCategory','Management Committee')
            ->where('adminunitStatus','ACTIVE')
            ->get();

        $department =DB::table('adminunit')
            ->select('id','adminUnitName')
            ->where('adminUnitCategory','Department')
            ->where('adminunitStatus','ACTIVE')
            ->get();

        $office =DB::table('adminunit')
            ->select('id','adminUnitName')
            ->where('adminUnitCategory','Office')
            ->where('adminunitStatus','ACTIVE')
            ->get();

        return view('people.people-edit')
            ->with('people',$people)
            ->with('office',$office )
            ->with('committee',$committee )
            ->with('department',$department );
    }


    public function update(Request $request)
    {
        $userId=Session::get('userId');
        $request->request->add(['updatedBy'=>$userId]);

        if($request->peoplePhoto)
        {
            $uploadedPath = '';
            $storagePath = '';
            $parent = '';
            $peopleCategory = $request->peopleCategory;
            if($peopleCategory=="Faculty Member")
            {
                $uploadedPath = 'uploads/images/peoples/Faculty Member/';
                $storagePath = 'uploads/images/peoples/Faculty Member/';
                $parent = "Faculty Member";
            }elseif($peopleCategory=="Admin Staff")
            {
                $uploadedPath = 'uploads/images/peoples/Admin Staff/';
                $storagePath = 'uploads/images/peoples/Admin Staff/';
                $parent = "Admin Staff";
            }elseif($peopleCategory=="Committee Member")
            {
                $uploadedPath = 'uploads/images/peoples/Committee Member/';
                $storagePath = 'uploads/images/peoples/Committee Member/';
                $parent = "Committee Member";
            }elseif($peopleCategory=="Visitor")
            {
                $uploadedPath = 'uploads/images/peoples/Visitor/';
                $storagePath = 'uploads/images/peoples/Visitor/';
                $parent = "Visitor";
            }elseif($peopleCategory=="Alumni")
            {
                $uploadedPath = 'uploads/images/peoples/Alumni/';
                $storagePath = 'uploads/images/peoples/Alumni/';
                $parent = "Alumni";
            }elseif($peopleCategory=="Key Person")
            {
                $uploadedPath = 'uploads/images/peoples/Key Person/';
                $storagePath = 'uploads/images/peoples/Key Person/';
                $parent = "Key Person";
            }elseif($peopleCategory=="System User")
            {
                $uploadedPath = 'uploads/images/peoples/System User/';
                $storagePath = 'uploads/images/peoples/System User/';
                $parent = "System User";
            }

            $photoUrl = $this->imageObject->photoUpload($request,'peoplePhoto',$uploadedPath,$storagePath,$parent,$userId);
            $request->request->add(['photo' =>$photoUrl]);
        }

        if($request->department_id)
        {
            $deptName = DB::table('adminunit')->select('adminUnitName')->where('id',$request->department_id)->get();
            $request->request->add(['departmentName' =>$deptName[0]->adminUnitName]);
        }

        if($request->office_id)
        {
            $officeName = DB::table('adminunit')->select('adminUnitName')->where('id',$request->office_id)->get();
            $request->request->add(['officeName' =>$officeName[0]->adminUnitName]);
        }

        if($request->committee_id)
        {
            $committeeName = DB::table('adminunit')->select('adminUnitName')->where('id',$request->committee_id)->get();
            $request->request->add(['committeeName' =>$committeeName[0]->adminUnitName]);
        }

        $request->request->add(['slugTitle' => Str::slug($request->fullName )]);

        $inputFormData=$request->except('_token','id','submit','peoplePhoto');
        $people=$this->crudObject->update(new People(),$inputFormData,'id',$request->id);

        if($people)
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
        $people=DB::table('people')->select(['*'])->orderBy('id','DESC')->get();
        return datatables()->of($people)
            ->addIndexColumn()
            ->filter(function ($instance) use ($request) {
                if (!empty($request->get('peopleCategory'))) {
                    $instance->collection = $instance->collection->filter(function ($row) use ($request)
                    {
                        return Str::contains($row['peopleCategory'], $request->get('peopleCategory')) ? true : false;
                    });
                }

                if (!empty($request->get('search'))) {
                    $instance->collection = $instance->collection->filter(function ($row) use ($request)
                    {
                        if (Str::contains(Str::lower($row['peopleCategory']), Str::lower($request->get('search')))){
                            return true;
                        }else if (Str::contains(Str::lower($row['fullName']), Str::lower($request->get('search')))) {
                            return true;
                        }else if (Str::contains(Str::lower($row['officeName']), Str::lower($request->get('search')))) {
                            return true;
                        }else if (Str::contains(Str::lower($row['designation']), Str::lower($request->get('search')))) {
                            return true;
                        }else if (Str::contains(Str::lower($row['departmentName']), Str::lower($request->get('search')))) {
                            return true;
                        }

                        return false;
                    });
                }

            })
            ->addColumn('photograph',function($people)
            {
                $btn1='<img style="border-radius:100px" src="'.url($people->photo) .'" width="100%">';
                return $btn1;
            })
            ->addColumn('action',function($people)
            {
                $btn1='<a href="'.'/people/people/show/'. Crypt::encryptString($people->id).'" class="edit btn btn-success btn-sm"><i class="fa fa-file-text-o" aria-hidden="true"></i> Show</a> ';
                $btn2='<a href="'.'/people/people/edit/'. Crypt::encryptString($people->id).'" class="edit btn btn-warning btn-sm"><i class="fa fa-file-text-o" aria-hidden="true"></i> Edit</a> ';
                return $btn1.$btn2;
            })
            ->rawColumns(['action','photograph'])
            ->make(true);
    }


    public function peopleList($category)
    {
        $adminStaff = DB::table('people')->where('peopleCategory','Admin Staff')->where('peopleStatus','ACTIVE')->count();
        $facultyMember = DB::table('people')->where('peopleCategory','Faculty Member')->where('peopleStatus','ACTIVE')->count();
        $alumni = DB::table('people')->where('peopleCategory','ALUMNI')->where('peopleStatus','ACTIVE')->count();
        $visitor = DB::table('people')->where('peopleCategory','VISITOR')->where('peopleStatus','ACTIVE')->count();
        $keyPerson = DB::table('people')->where('peopleCategory','Key Person')->where('peopleStatus','ACTIVE')->count();
        $registeredPeople = DB::table('people')->where('peopleStatus','ACTIVE')->count();

        return view('people.peoples')
            ->with('adminStaff',$adminStaff)
            ->with('facultyMember',$facultyMember)
            ->with('registeredPeople',$registeredPeople)
            ->with('keyPerson',$keyPerson)
            ->with('visitor',$visitor)
            ->with('alumni',$alumni)
            ->with('category',$category);
    }

}
