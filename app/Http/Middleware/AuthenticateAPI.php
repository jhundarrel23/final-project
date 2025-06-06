<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateAPI
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
        // Check if the user is authenticated with API token
        if (Auth::guard('api')->check()) {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthorized'], 401);  // Respond with Unauthorized if not authenticated
    }
}
