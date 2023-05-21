<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
   protected function redirectTo($request)
{
    if ($request->expectsJson()) {
        return response()->json(['message' => 'Unauthenticated.'], 401);
    }

    if (Auth::check() && Auth::user()->role == 'Admin') {
    return redirect()->route('admin.dashboard');
    }

    if(Auth::check() && Auth::user()->role == 'Superadmin'){
        return redirect()->route('superadmin.dashboard');
    }

    return redirect('/dashboard');
    }
}
