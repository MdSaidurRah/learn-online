<?php

namespace App\Http\Controllers\UserController;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\LibraryFunctions\emailsender;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\RolePermission;



class RolePermissionController extends Controller
{
    public $pageTitle;
    public $emailObject;

    public function __construct()
    {
        $this->emailObject = new emailsender();
        $this->middleware('checkPermission');
    }


    public function rolePermissionAssign(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userRole' => 'required',
            'userPermission' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }
        $userRole = $request->userRole;
        $userPermission = $request->userPermission;
        $checkExist = DB::table('access_permission')->select('*')
            ->where('userRole', $userRole)
            ->where('permission', $userPermission)
            ->count();

        if($checkExist>0)
        {
            return response()->json(['fail' => 'Assign Role and Permission Already Exist.']);

        }else
        {
            DB::table('access_permission')->insert(
                ['userRole' =>  $userRole, 'permission' => $userPermission]
            );

            return response()->json(['success' => 'User role and permission assignment has been successful.']);
        }

    }


    public function rolePermissionDelete($id)
    {
        $keyId = Crypt::decryptString($id);
        RolePermission::find($keyId)->delete();
        return response()->json(['success'=>'User has been deleted successfully.']);

    }

    


    public function saveRole(Request $request)
    {
        log::info("Role");
        $validator = Validator::make($request->all(), [
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }
        $permission = $request->role;
        $checkExist = DB::table('roles')->select('*')->where('role', $permission)->count();
        if($checkExist>0)
        {
            return response()->json(['fail' => 'Role Already Exist.']);

        }else
        {
            DB::table('roles')->insert(
                ['role' =>  $request->role]
            );
            return response()->json(['success' => 'Role created successfully.']);
        }

    }


    public function savePermission(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'permission' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        $permission = $request->permission;
        $checkExist = DB::table('permission')->select('*')->where('permission', $permission)->count();

        if($checkExist>0)
        {
            return response()->json(['fail' => 'Permission Already Exist.']);

        }else
        {
            DB::table('permission')->insert(
                ['permission' =>  $request->permission]
            );
            return response()->json(['success' => 'Permission created successfully.']);
        }

    }

    public function rolePermission()
    {
        $role = DB::table('roles')->select('id','role')->where('roleStatus','ACTIVE')->get();
        $permission = DB::table('permission')->select('id','permission')->where('permissionStatus','ACTIVE')->get();
        $notice='';
        return view('admin.role-permission')
            ->with('role',$role)
            ->with('permission',$permission);
    }

    public function getRolePermission(Request $request)
    {
        $rolePermission = DB::table('access_permission')
            ->select([
                '*'
            ])
            ->orderBy('id','DESC')
            ->get();

        return datatables()->of($rolePermission)
            ->addIndexColumn()
            ->addColumn('action', function($rolePermission)
            {
                $btn1 = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.Crypt::encryptString($rolePermission->id).'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
                return $btn1;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getRole(Request $request)
    {
        $role = DB::table('roles')
            ->select([
                '*'
            ])
            ->orderBy('id','DESC')
            ->get();

        return datatables()->of($role)
            ->addIndexColumn()
            ->addColumn('action', function($role)
            {
                $btn1 = '<a href="'. '/user/view-user/'.$role->id.'" class="edit btn btn-info btn-sm"><i class="fa fa-file-text-o" aria-hidden="true"></i> View</a> ';
                return $btn1;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getPermission(Request $request)
    {
        $permission = DB::table('permission')
            ->select([
                '*'
            ])
            ->orderBy('id','DESC')
            ->get();

        return datatables()->of($permission)
            ->addIndexColumn()
            ->addColumn('action', function($permission)
            {
                $btn1 = '<a href="'. '/user/view-user/'.$permission->id.'" class="edit btn btn-info btn-sm"><i class="fa fa-file-text-o" aria-hidden="true"></i> View</a> ';
                return $btn1;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

}

