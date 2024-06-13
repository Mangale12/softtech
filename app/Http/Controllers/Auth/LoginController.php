<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    // https://laracasts.com/discuss/channels/laravel/login-redirect-not-working-with-laravel-7
    // https://laracasts.com/discuss/channels/laravel/login-redirect-not-working-with-laravel-7


    public function redirectTo()
    {
        // $type = Auth::user()->role;
        if(!empty(auth()->user()->role_super )){
            if(auth()->user()->role_super == 1){
            $permissions = Permission::all();
            // Assign all permissions to the user
            auth()->user()->syncPermissions($permissions);
            }
        }
        return '/admin/dashboard';
        // Check user Type
        switch ($type) {
            case 'admin':

                break;
            default:
                return '/user/dashboard';
                break;
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}
