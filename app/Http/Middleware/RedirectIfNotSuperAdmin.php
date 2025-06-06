<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\FlareClient\Http\Exceptions\NotFound;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('admin')->user()->role !== 'superadmin') {
            abort(404);
        }
        return $next($request);
    }
}
