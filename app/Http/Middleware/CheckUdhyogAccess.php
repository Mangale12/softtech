<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Udhyog;
class CheckUdhyogAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $industryName)
    {
        $user = Auth::user();
        // Check if the user is an admin
        if ($user && $user->hasRole('admin')) {
            // Admin has full access
            return $next($request);
        }
        // Check if the request has 'udhyog' parameter
        if ($request->has('udhyog')) {
            $udhyogName = $request->udhyog;
            $udhyog = Udhyog::where('name', $udhyogName)->first();

            if ($udhyog) {
                // Check if the user has access to the udhyog
                if ($user && $user->udhyog_id == $udhyog->id) {
                    return $next($request);
                } else {
                    abort(403, 'माफ गर्नुहोस् तपाईसँग यस उद्योगमा पहुँच गर्ने अनुमति छैन।');
                }
            } else {
                abort(404, 'माफ गर्नुहोस् उद्योग फेला परेन।');
            }
        }

        return $next($request);
    }
}
