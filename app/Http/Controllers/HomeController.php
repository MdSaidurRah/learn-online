<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\LibraryFunctions\accesslogger;
use Carbon\Carbon;
use App\LibraryFunctions\emailsender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public $accessLogger;
    public $emailObject;

    public function __construct()
    {
        $this->emailObject = new emailsender();
        $this->accessLogger = new accesslogger();
    }

    public function welcome()
    {
        return view('user.login');
    }


}

