<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitor;

class VisitorTracker {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        Visitor::hit();
        return $next($request);
    }
}  