<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Membership
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
        if($request->user()->is_verified == 1 && $request->user()->is_member == 1){
            return $next($request);
        }else{
            // contact to administrators not authorized
            return response()->view('errors.403', [], 403);
        }
    }
}
