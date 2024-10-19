<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;



class CheckAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */


    public function handle($request, Closure $next)
    {
        if (Session::has('loginStatus')) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
