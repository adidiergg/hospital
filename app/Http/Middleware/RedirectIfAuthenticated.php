<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        
        foreach ($guards as $guard) {
            //dd(Auth::guard('receptionist')->check());
            
            if (Auth::guard('admin')->check()) {
                return redirect('/admin');
            }

            if (Auth::guard('receptionist')->check()) {
                return redirect('/recepcionista');
            }

            
            if (Auth::guard('doctor')->check()) {
                return redirect('/doctor');
            }
           
            /*
            if (Auth::guard($guard)->check()) {
                #RouteServiceProvider::HOME
                return redirect('/fff');
            }
            */
            return redirect('/login');
            
        }
       
       
        

        return $next($request);
    }
}
