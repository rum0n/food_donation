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
        if (Auth::guard($guard)->check() && Auth::user()->role->id == 1)
        {
            return redirect('/admin/dashboard');
        }
        elseif(Auth::guard($guard)->check() && Auth::user()->role->id == 2)
        {
            return redirect('/volunteer/dashboard');
        }
        elseif(Auth::guard($guard)->check() && Auth::user()->role->id == 3)
        {
            return redirect('/user/dashboard');
        }
        else
        {
            return $next($request);
        }

    }
}