<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            if (auth()->user()->role === 'admin') {
                return $next($request);
            }

            abort(403, 'Unauthorized action.');
        })->only(['admin']);
        
        $this->middleware(function ($request, $next) {
            if (auth()->user()->role === 'superadmin') {
                return $next($request);
            }

            abort(403, 'Unauthorized action.');
        })->only(['superadmin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
