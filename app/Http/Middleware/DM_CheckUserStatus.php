<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class DM_CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user's status is 0
            if (Auth::check() && Auth::user()->status != 1) {
                Auth::logout();
                session()->flash('alert-warning', 'You are Inactive User. Please Contact Admin');
                return redirect()->route('dcms.login');
            }
        }
        return $next($request);
    }
}
