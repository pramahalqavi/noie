<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RedirectIfNotAdmin {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin') {
        // dd(Auth::guard($guard)->user()->getEmail());
        // if (!Auth::guard($guard)->check()) {
        //     return redirect(route('login'));
        // }
        if (!Session::get('auth-login')) {
            return redirect(route('login'));
        }
        return $next($request);
    }
}  