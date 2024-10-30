<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StaffMiddleware
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
        // Check if the staff user is authenticated
        if (!Auth::guard('staff')->check()) {
            // Redirect to login page if not authenticated
            return redirect()->route('login');
        }


        if ($request->routeIs('staffdashboard')) {
            return redirect()->route('blog.index');
        }

        // Proceed with the request if authenticated
        return $next($request);
    }
}
