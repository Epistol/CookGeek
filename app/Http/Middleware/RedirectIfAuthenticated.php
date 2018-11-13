<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
	        dd(Auth::user()->nb_visites);
	        if(Auth::user()->nb_visites >= 1){
		        return redirect('/home');
	        }
	        else {
	        	return redirect()->back();
	        }
        }

        return $next($request);
    }
}
