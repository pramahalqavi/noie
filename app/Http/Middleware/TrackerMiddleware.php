<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Tracker;

class TrackerMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        Tracker::hit();
        return $next($request);
    }
}  