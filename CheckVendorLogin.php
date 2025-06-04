<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckVendorLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('vendor_id')) {
            return redirect()->route('loginForm')->withErrors(['pass' => 'You must login first']);
        }
        return $next($request);
    }
}

