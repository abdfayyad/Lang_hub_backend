<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentMiddleware
{
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->role_id == 4){
            return $next($request);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
