<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;

use App\LibraryFunctions\emailsender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller

{

    public $pageTitle;
    public $emailObject;

    public function __construct()
    {
        $this->emailObject = new emailsender();
    }


    public function resetPassword()
    {
        $pageTitle='ResetPassword';
        return view('User.reset-password')
            ->with('pageTitle', $pageTitle);
    }

    public function resetPasswordRequest(Request $request)
    {
        $validated = $request->validate([
            'userEmail' => 'required',
        ]);
        return $request;
    }
}

