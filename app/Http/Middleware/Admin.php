<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Admin
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
        $response = $next($request);
        return $response;
        if(Auth::check()){
            if(Auth::user()->role_super == 1){
                // Auth::logout();
                session()->flash('alert-warning', 'Please check your credential and Login again !!!');
                return redirect()->back();
            }
            if(Auth::user()->role == "admin")
            {
                return $response;
            }
        }
        else{
            session()->flash('alert-warning', 'Please check your credential and Login again !!!');
            return redirect()->route('login');
        }
    }
}
