<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Front\DashboardController;

use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Retrieve the currently logged-in user
        if (auth()->check() && auth()->user()->usertype == 1) {
            return $next($request);
        }
        abort(403, 'Unauthorized');
    }
}
