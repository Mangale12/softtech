<?php

namespace Spatie\Permission\Middlewares;

use App\Models\Udhyog;
use Closure;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Illuminate\Support\Facades\Log;

class PermissionMiddleware
{
    public function handle($request, Closure $next, $permission, $guard = null)
    {
        $authGuard = app('auth')->guard($guard);

        if ($authGuard->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        $permissions = is_array($permission) ? $permission : explode('|', $permission);
        $checkPermission = null;

        // Check if user has the required permissions or is an admin
        foreach ($permissions as $perm) {
            if ($authGuard->user()->can($perm) || $authGuard->user()->hasRole('admin')) {
                Log::info('Permission inside', ['checkPermission' => $checkPermission, 'authGuard' => $perm]);
                return $next($request);
            }
        }
         // If logging outside the loop for denied permissions
         foreach ($permissions as $perm) {
            Log::info('Permission denied for '.$perm);
        }
        if ($request->has('udhyog')) {
            $udhyogName = $request->udhyog;
            // Fetch the udhyog record by name or ID
            $udhyog = Udhyog::where('name', $udhyogName)
                            ->orWhere('id', $udhyogName)
                            ->firstOrFail();
            // If the user is accessing their own udhyog, allow the request
            if ($authGuard->user()->udhyog_id == $udhyog->id) {
                return $next($request);
            }

        }
        // If none of the conditions are met, throw unauthorized exception
        throw UnauthorizedException::forPermissions($permissions);
    }
}
