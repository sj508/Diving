<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\customer;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */

    protected $redirectTo = '/';
    protected $guard = 'customer';

    // public function handle($request, Closure $next, $guard = 'web')
    // {

    //   // dd(Auth::guard('admin')->attempt($credentials,true));
    //     if (!Auth::guard($guard)->check()) {

    //         return redirect('admin/login');
    //     }
        
    //     return $next($request);
    // }
    
    public function handle($request, Closure $next, $guard = 'customer')
    {
        if (!Auth::guard($guard)->check() && !Auth::guard('customer')->check()) {
            return redirect('/');
        }
        return $next($request);
    }
}