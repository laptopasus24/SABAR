<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class DynamicTitleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $role = $user ? $user->role : null;

        $title = 'Dashboard - SABAR'; // Default Title

        if ($role === 'admin') {
            $title = 'Dashboard Admin - SABAR';
        } elseif ($role === 'peternak') {
            $title = 'Dashboard Peternak - SABAR';
        }

        // Share title to all views
        view()->share('dynamicTitle', $title);

        return $next($request);
    }
}

