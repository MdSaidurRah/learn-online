<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\LibraryFunctions\accesslogger;
use App\LibraryFunctions\emailsender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class AuthenticationController extends Controller
{
    public $pageTitle;
    public $emailObject;
    public $accessLogger;

    public function __construct()
    {
        $this->emailObject = new emailsender();
        $this->accessLogger = new accesslogger();
    }

    public function admin()
    {
       return view('dashboard');
    }

    public function login()
    {
        $pageTitle='Account Login';
        return view('User.login')
            ->with('pageTitle', $pageTitle);
    }

    public function loginAttempt(Request $request)
    {
        $validated = $request->validate([
            'userEmail' => 'required',
            'userPassword' => 'required',
        ]);

        $user = DB::table('users')
            ->select('*')
            ->where('email', $request->userEmail)
            ->where('password', md5($request->userPassword))
            ->get();

        if (count($user) > 0) {
            $this->accessLogger->logEntry($user[0]->id,"Successful Login Attempt","System",'','');
            session::flush();
            $loggedUserId = $user[0]->id;
            Session::put('userName', $user[0]->name);
            Session::put('userId', $loggedUserId);
            Session::put('systemUniqueId', $user[0]->systemUniqueId);
            Session::put('userEmail', $user[0]->email);
            Session::put('userRole', $user[0]->userRole);
            Session::put('loginStatus', 'ACTIVE');
            return Redirect::route('dashboard');

        } else {
            $message = "User email or password not matched";
            flash()->addError('Login Fail. Please try again with valid credential');
            return view('User.login')
                ->with('message', $message);
        }
    }

    public function signOut()
    {
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        $this->accessLogger->logEntry(Session::get('userId'),"Successful Logout Attempt","System",'','');
        session::flush();
        Session::flash('message', "You are signed out successfully");
        return Redirect::route('login');
    }

}

