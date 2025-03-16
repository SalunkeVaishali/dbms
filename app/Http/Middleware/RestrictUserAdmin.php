<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestrictUserAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and has the "User Admin" role
        if (Auth::check() && Auth::user()->role->role_name === 'user') {
            return redirect()->route('home')->with('error', 'Access denied to the Category module.');
        }

        return $next($request); // Allow access if not "User Admin"
    }
}

