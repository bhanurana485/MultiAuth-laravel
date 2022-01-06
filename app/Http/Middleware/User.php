<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }


        if (Auth::user()->role == "user") {
            return $next($request);
        }
        if (Auth::user()->role == "admin") {
            return redirect()->route('admin');
        }
        if (Auth::user()->role == "vendor") {
            return redirect()->route('vendor');
        }


        return $next($request);
    }
}
