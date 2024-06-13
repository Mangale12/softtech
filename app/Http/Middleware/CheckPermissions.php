<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermissions
{
    public function handle(Request $request, Closure $next, ...$permissions)
    {
        foreach ($permissions as $permission) {
            if (!Auth::user()->hasPermissionTo($permission)) {
                abort(403, 'Unauthorized');
            }
        }

        return $next($request);
    }
}

