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
        if(Auth::guard($guard)->check())
        {
          if(Auth::user()->hasRole('expert'))
          {
              return redirect()->route('expert.dashboard'); //REDIRECT to ADMIN DASHBOARD
          }

          if(Auth::user()->hasRole('user'))
          {
              return redirect()->route('car_user.dashboard'); //REDIRECT to USER DASHBOARD
          }
        }

        return $next($request);
    }
}
