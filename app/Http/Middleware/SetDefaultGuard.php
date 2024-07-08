<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetDefaultGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard('webstudents')->check()) {
            Auth::shouldUse('webstudents');
        } elseif (Auth::guard('webteachers')->check()) {
            Auth::shouldUse('webteachers');
        } elseif (Auth::guard('webparents')->check()) {
            Auth::shouldUse('webparents');
        } elseif (Auth::guard('webaccountants')->check()) {
            Auth::shouldUse('webaccountants');
        }

        return $next($request);
    }
}
