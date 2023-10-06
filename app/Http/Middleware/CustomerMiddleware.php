<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomerMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'customer') {
            return $next($request);
        }

        return redirect()->route('loginCustomer')->with('error', 'You are not authorized to access this page.');
    }
}
