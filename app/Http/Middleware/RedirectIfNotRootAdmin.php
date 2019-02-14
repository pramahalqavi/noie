<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RedirectIfNotRootAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin', $root = 'diahdewi.165@gmail.com')
    {
        // if (!Auth::guard($guard)->check() || Auth::guard($guard)->user()->getEmail() != $root) {
        //     return redirect(route('admin-role'));
        // }
        if (!Session::get('auth-login') || Session::get('auth-email') != $root) {
            return redirect(route('admin-role'));
        }
        return $next($request);
    }
}
