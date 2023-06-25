<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherMiddleware
{
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->role_id == 3){
            return $next($request);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
