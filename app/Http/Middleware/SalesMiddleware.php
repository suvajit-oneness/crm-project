<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SalesMiddleware
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
        // return $next($request);

        if(Auth::user() && Auth::user()->user_type != 1){
            return $next($request);
        }
        Session::flash('error', 'you are not authorise to move');
        return redirect('/home');
    }




}