<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;

use App\LibraryFunctions\accesslogger;
use App\LibraryFunctions\emailsender;
use App\LibraryFunctions\imagelib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserProfileController extends Controller
{
    public $pageTitle;
    public $emailObject;
    public $accessLogger;
    public $imageObject;

    public function __construct()
    {
        $this->emailObject = new emailsender();
        $this->accessLogger = new accesslogger();
        $this->imageObject = new imagelib();
        $this->middleware('checkPermission');
    }

    public function editProfile()
    {
        $userId = Session::get('userId');
        $user = DB::table('users')->select('*')->where('id',$userId)->get();
        return view('admin.edit-profile')
            ->with('user',$user);
    }

    public function userProfile()
    {

        return view('admin.user-profile');
    }

    public function passwordChange()
    {
        return view('admin.password-change');
    }

    public function passwordUpdate(Request $request)
    {
        $validated = $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required',
        ]);

        $userEmail = Session::get('userEmail');

        $user = DB::table('users')
            ->select('id','userEmail')
            ->where('userEmail', $userEmail)
            ->where('userPassword', md5($request->currentPassword))
            ->get();

        if(count($user)>0)
        {
            DB::table('users')
                ->where('userEmail',$user[0]->userEmail)
                ->where('id', $user[0]->id)
                ->update([
                    'userPassword' => md5($request->newPassword)
                ]);

            $this->accessLogger->logEntry($user[0]->id,"Successful Password Change Attempt.","System",'','');
            $userEmail = $user[0]->userEmail;

            $subject = "User Password Change Operation";
            $emailNotification= $this->emailObject->sendTextEmail('email-views.password-change', $userEmail, $subject, $request->newPassword);
            flash()->addSuccess('Your Password has been changed. Please check your email.');
            return Redirect::back();
        }else
        {
            flash()->addError('Sorry, Current Password does not found in system. Please try again.');
            return Redirect::back();
        }
    }

    public function profilePhotoUpdate(Request $request)
    {
       $userId = Session::get('userId');

        if($request->profileImage)
        {
            $uploadedPath = 'uploads/images/user-profile/';
            $stroagePath = 'uploads/images/user-profile/';
            $parent = "user-pro-photo";
            $photoUrl = $this->imageObject->photoUpload($request,'profileImage',$uploadedPath,$stroagePath,$parent,$userId);
            $request->request->add(['photograph' =>$photoUrl]);
        }

        $userUdpate = DB::table('users')
                ->where('id', $userId)
                ->update([
                    'userPhoto' => $request->photograph
                ]);

        if($userUdpate)
        {
            $this->accessLogger->logEntry($userId,"User profile photo change.","System",'','');

            flash()->addSuccess('Your profile photo has been change successfully.');
            return Redirect::back();
        }else
        {
            flash()->addError('Sorry, Your profile photo does not change successfully.');
            return Redirect::back();
        }

    }

}

