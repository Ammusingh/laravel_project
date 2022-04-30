<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
use Illuminate\Http\Request;

class AdminMiddleware
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
        if (Auth::check() && auth()->user()->role == 1) {
            return $next($request);
        }
        else
        {
            Session::flash('error', "You don't have access for requested resource!!");
            return redirect('/login');
        }
       

        
    }
}
