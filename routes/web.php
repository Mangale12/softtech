<?php

use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route("login");
});
Auth::routes();

/**
 * / Password Reset Routes...
 */
Route::get('password/resetform', [Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.resetform');
Route::post('password/email', [Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/request/{token}', [Auth\ResetPasswordController::class, 'showResetForm'])->name('password.request.token');
Route::post('password/update', [Auth\ResetPasswordController::class, 'reset'])->name('password.update');
/**
 * Ajax Routes
 */
Route::post('/getLand',               [App\Http\Controllers\DropdownController::class, 'getLand'])->name('getLand'); // for get land list
Route::post('/getProducts',              [App\Http\Controllers\DropdownController::class, 'getProduct'])->name('getProduct'); // for get land list
Route::post('/getAnimalList',         [App\Http\Controllers\DropdownController::class, 'getAnimalList'])->name('getAnimalList'); // for Animal list

Route::post('/getDistrict',          [App\Http\Controllers\Ajax\StateDistrictPalikaController::class, 'getDistrict'])->name('getDistrict');
Route::post('/getPalika',            [App\Http\Controllers\Ajax\StateDistrictPalikaController::class, 'getPalika'])->name('getPalika');
Route::get('/status',                             [App\Http\Controllers\Admin\UserController::class, 'userOnlineStatus'])->name('userOnlineStatus');

// GET BAALI
Route::get('/getBaali',                           [App\Http\Controllers\DropdownController::class, 'getBaali'])->name('getBaali');

/**
 * Admin  Routes
 */
Route::group(['namespace' => 'Backend', 'prefix' => '/admin', 'as' => 'admin.', 'middleware' => ['auth','status']], function () {
    include('Backend/Backend.php');
});
/**
 * User  Routes
 */
Route::group(['namespace' => 'User', 'prefix' => '/user', 'as' => 'user.', 'middleware' => ['auth', 'user', 'status']], function () {
    include('User/User.php');
});
