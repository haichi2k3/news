<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role == 1) {
                return $next($request);
            } else {
                Auth::logout();
                return redirect()->route('login2')->withErrors(['login2' => 'Unauthorized role.']);
            }
        }

        return redirect()->route('login2')->withErrors(['login2' => 'Please login first.']);
        // if(Auth::check() && Auth::user()->role == 1) {
        //     return $next($request);
        // }
        
        // return redirect()->route('login2');
    }
}
