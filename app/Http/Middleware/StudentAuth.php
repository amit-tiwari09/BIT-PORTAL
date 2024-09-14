<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StudentAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated as a student
        if (!Auth::guard('student')->check()) {
            // If not authenticated, redirect to the student login page
            return redirect()->route('login')
                ->with('error', 'You must be logged in as a student to access this page.');
        }

        // If authenticated, allow the request to proceed
        return $next($request);
    }
}
