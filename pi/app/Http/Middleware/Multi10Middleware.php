<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Multi10Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        if ($request->digit) {
            $multi10 = $request->digit * 10;
            $request->digit = $multi10;
        }
        
        return $next($request);
    }
}
