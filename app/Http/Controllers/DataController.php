<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\LibraryFunctions\accesslogger;
use Carbon\Carbon;
use App\LibraryFunctions\emailsender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class DataController extends Controller
{
    public $accessLogger;
    public $emailObject;

    public function __construct()
    {
        $this->emailObject = new emailsender();
        $this->accessLogger = new accesslogger();
        $this->middleware('checkPermission');
    }

    public function getMessagePeople(Request  $request)
    {
        $data['person'] = DB::table('people')
            ->select("id","fullName")
            ->where("peopleCategory", $request->messageCategory)
            ->get();
        return response()->json($data);

    }


    public function getPeople(Request $request)
    {
        $people=DB::table('people')
            ->select(['*'])
            ->where('peopleCategory',$request->category)
            ->orderBy('id','DESC')
            ->get();

        return datatables()->of($people)
            ->addIndexColumn()
            ->addColumn('workArea',function( $people)
            {
                $btn1 ="";
                if($people->peopleCategory == "Admin Staff")
                {
                    $btn1 = $people->officeName;
                }elseif($people->peopleCategory == "Alumni")
                {
                    $btn1 = $people->departmentName;
                }elseif($people->peopleCategory == "Faculty Member")
                {
                    $btn1 = $people->departmentName;
                }elseif($people->peopleCategory == "Key Person")
                {
                    $btn1 = $people->officeName;
                }elseif($people->peopleCategory == "Visitor")
                {
                    $btn1 = $people->institutionName;
                }elseif($people->peopleCategory == "Committee Member")
                {
                    $btn1 = $people->committeeName;
                }

                return $btn1;
            })

            ->addColumn('photograph',function($people)
            {
                $btn1='<img  src="'.url($people->photo) .'" width="50%">';
                return $btn1;
            })
            ->addColumn('action',function($people)
            {
                $btn1='<a href="'.'/actions/show/'. $people->id.'" class="edit btn btn-success btn-sm"><i class="fa fa-file-text-o" aria-hidden="true"></i> Show</a> ';
                $btn2='<a href="'.'/actions/edit/'. $people->id.'" class="edit btn btn-warning btn-sm"><i class="fa fa-file-text-o" aria-hidden="true"></i> Edit</a> ';
                return $btn1.$btn2;
            })
            ->rawColumns(['action','photograph','workArea'])
            ->make(true);

    }
}

