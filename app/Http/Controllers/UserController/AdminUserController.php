<?php

namespace App\Http\Controllers\UserController;

use App\Models\User;
use App\Models\Systemuser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\LibraryFunctions\crudlib;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\LibraryFunctions\emailsender;
use Illuminate\Support\Facades\Crypt;
use App\LibraryFunctions\accesslogger;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AdminUserController extends Controller
{
    public $pageTitle;
    public $emailObject;
    public $_CurdLibObject;
    public $accessLogger;

    public function __construct()
    {
        $this->emailObject = new emailsender();
        $this->_CurdLibObject = new crudlib();
        $this->accessLogger = new accesslogger();
        $this->middleware('checkPermission');
    }



    public function allUser()
    {

        $user = DB::table('users')->get();
        $userNumber =  count($user);
        return view('admin.users')
            ->with('userNumber',$userNumber)
            ->with('user',$user);
    }


    public function addUser()
    {
        $department = DB::table('adminunit')
            ->select('id','adminUnitName')
            ->where('adminUnitCategory',"Department")
            ->where('adminunitStatus',"ACTIVE")
            ->get();

        $role = DB::table('roles')->select('role')->where('roleStatus','ACTIVE')->get();
        return view('admin.add-user')
            ->with('role',$role)
            ->with('department',$department);
    }

    public function userRole($id)
    {

        $keyId = Crypt::decryptString($id);

        $user = DB::table('users')
            ->select('*')
            ->where('id',$keyId)
            ->get();

        $role = DB::table('roles')->select('role')->where('roleStatus','ACTIVE')->get();
        $permission = DB::table('access_permission')->select('permission','userRole')->where('userRole',$user[0]->userRole)->get();

        return view('admin.user-role')
            ->with('role',$role)
            ->with('permission',$permission)
            ->with('user',$user);
    }



    public function storeUser(Request $request)
    {

        if($request->department_id)
        {
            $department = DB::table('adminunit')->select('adminUnitName')->where('id',$request->department_id)->get();
            $request->request->add(['department' =>$department[0]->adminUnitName]);
        }
        if($request->password)
        {
            $request->request->add(['userPassword'=> md5($request->password)]);
        }
        $data = $request->except('_token','password');
        $userAdd  = $this->_CurdLibObject->create(new Systemuser(),$data);
        if($userAdd)
        {
            $this->accessLogger->logEntry(0,"New User create in system Admin","System",'','');
            flash()
                ->option('timeout', 6000)
                ->addSuccess('New User Added successfully.');
            return redirect()->back();
        }else
        {
            flash()
                ->option('timeout', 6000)
                ->addError('Sorry, New User added successfully failed.');
            return redirect()->back();
        }
    }

    public function delete($id)
    {

        $keyId = Crypt::decryptString($id);
        User::find($keyId)->delete();
        return response()->json(['success'=>'User has been deleted successfully.']);
    }


    public function viewUser($id)
    {
        $keyId = Crypt::decryptString($id);

        $user = DB::table('users')
            ->select('*')
            ->where('id',$keyId)
            ->get();

        $role = DB::table('roles')->select('role')->where('roleStatus','ACTIVE')->get();
        $department = DB::table('adminunit')
            ->select('id','adminUnitName')
            ->where('adminUnitCategory',"Department")
            ->where('adminunitStatus',"ACTIVE")
            ->get();

        return view('admin.user-view')
            ->with('role',$role)
            ->with('department',$department)
            ->with('user',$user);
    }

    public function viewUserActivities($id)
    {
        $keyId = Crypt::decryptString($id);

        $user = DB::table('users')
            ->select('*')
            ->where('id',$keyId)
            ->get();

        $userActivities = DB::table('access_logs')
            ->select('*')
            ->where('userId',$keyId)
            ->orderBy('id','DESC')
            ->get();

        return view('admin.view-user-activities')
            ->with('user',$user)
            ->with('userActivities',$userActivities);
    }

    public function updateUser(Request $request)
    {
        if($request->department_id)
        {
            $department = DB::table('adminunit')->select('adminUnitName')->where('id',$request->department_id)->get();
            $request->request->add(['department' =>$department[0]->adminUnitName]);
        }
        if($request->password)
        {
            $request->request->add(['userPassword'=> md5($request->password)]);
        }

        $data = $request->except('_token','id','password');

        $othersUpdate  = $this->_CurdLibObject->update(new Systemuser(),$data,'id',$request->id);

        if($othersUpdate)
        {
            $this->accessLogger->logEntry($request->id,"User Information update by system Admin","System",'','');
            flash()
                ->option('timeout', 6000)
                ->addSuccess('Others information has been update successfully.');
            return redirect()->back();
        }else
        {
            flash()
                ->option('timeout', 6000)
                ->addError('Sorry, User information update has been failed.');
            return redirect()->back();
        }
    }


    public function allSystemUser(Request $request)
    {
        $users = DB::table('users')
            ->select([
                '*'
            ])
            ->orderBy('id','DESC')
            ->get();


        return datatables()->of($users)
            ->addIndexColumn()

            ->filter(function ($instance) use ($request) {
                if (!empty($request->get('userRole'))) {
                    $instance->collection = $instance->collection->filter(function ($row) use ($request)
                    {
                        return Str::contains($row['userRole'], $request->get('userRole')) ? true : false;
                    });
                }

                if (!empty($request->get('search'))) {
                    $instance->collection = $instance->collection->filter(function ($row) use ($request)
                    {
                        if (Str::contains(Str::lower($row['userRole']), Str::lower($request->get('search')))){
                            return true;
                        }else if (Str::contains(Str::lower($row['name']), Str::lower($request->get('search')))) {
                            return true;
                        }else if (Str::contains(Str::lower($row['department']), Str::lower($request->get('search')))) {
                            return true;
                        }else if (Str::contains(Str::lower($row['userEmail']), Str::lower($request->get('search')))) {
                            return true;
                        }

                        return false;
                    });
                }

            })
            ->addColumn('action', function($users)
            {
                $btn1 = '<a href="'. '/user/view-user/'. Crypt::encryptString($users->id).'" class="edit btn btn-info btn-sm"><i class="fa fa-file-text-o" aria-hidden="true"></i> View</a> ';
                $btn2 = '<a href="'. '/user/view-activities/'. Crypt::encryptString($users->id).'" class="edit btn btn-primary btn-sm"><i class="fa fa-file-text-o" aria-hidden="true"></i> Activites</a> ';
                $btn3 = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.Crypt::encryptString($users->id).'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
                $btn4 = '<a href="'. '/user/user/role/{'. Crypt::encryptString($users->id).'" class="edit btn btn-primary btn-sm"><i class="fa fa-file-text-o" aria-hidden="true"></i> Role</a> ';
                return $btn4.$btn1.$btn2.$btn3;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

}

