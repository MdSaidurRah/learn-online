<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use DB;

class IsPermitted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    public function handle($request, Closure $next)
    {
        $resource = $request->route()->getName();
        $hasPermission = DB::table('access_permission')
            ->select('permission')
            ->where('userRole',Session::get('userRole'))
            ->where('permission',$resource)
            ->get();
        if(count($hasPermission)>0)
        {
            return $next($request);
        }else
        {
            return Redirect::back();
        }
    }
}
