<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Redirect;

class Preventback
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
        $response = $next($request);
        return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
            ->header('Pragma','no-cache')
            ->header('Expires','Fri, 01 jan 1990 00:00:00 GMT');

//        $response = $next($request);
//        return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
//        ->header('Pragma','no-cache')
//        ->headers('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
//        ->header('Expires','Fri, 01 jan 1990 00:00:00 GMT');
    }
}
