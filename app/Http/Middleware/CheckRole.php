<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role = null)
    {
        if (Auth::check()) {
            $userRole = Auth::user()->role;

            if ($userRole == $role || ($role == 'user' && $userRole == 'admin')) {
                return $next($request);
            }
        }

        abort(403, 'Forbidden');
    }
}
