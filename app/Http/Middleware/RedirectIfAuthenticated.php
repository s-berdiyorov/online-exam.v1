<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard){
            case 'admin':
                if(Auth::guard($guard)->check()){
                    return redirect()->route(RouteServiceProvider::ADMIN_DASHBOARD);
                }
                break;
            case 'moderator':
                if(Auth::guard($guard)->check()){
                    return redirect()->route(RouteServiceProvider::MODERATOR_DASHBOARD);
                }
                break;
            default:
                if(Auth::guard($guard)->check()){
                    return redirect()->route(RouteServiceProvider::HOME_DASHBOARD);
                }
                break;
        }

        return $next($request);
    }
}
