<?php

namespace App\Http\Middleware;

use Session;
use Closure;
use Illuminate\Http\Request;
use Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && $request->user()->role == 2) {
            return $next($request);
        }
        if(Auth::check() && $request->user()->role == 3)
        {
            return $next($request);
        }
            Session::flash('error', "You don't have access for requested resource!!");
            return redirect('/login');
        
    }
}
