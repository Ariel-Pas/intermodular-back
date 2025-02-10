<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RolCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next, ...$roles): Response
    // {
    //     if (Auth::check() && in_array(Auth::user()->role, $roles)) {
    //         return $next($request);
    //     }
    //     return redirect('/');
    // }

    public function handle(Request $request, Closure $next, ...$roles): Response
    {

        if (Auth::check() && Auth::user()->roles->pluck('nombre')->intersect($roles)->isNotEmpty()) {
            return $next($request);
        }
        return redirect('/');
    }
}
