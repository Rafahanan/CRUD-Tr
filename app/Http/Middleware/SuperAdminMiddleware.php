<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if(auth()->check() && auth()->user()->role == 'superadmin') {
            return $next($request);
        }

        return redirect('/login');
    }
}