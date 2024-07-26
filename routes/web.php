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

/**
 * / Password Reset Routes...
 */
Route::get('password/resetform',                        [Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.resetform');
Route::post('password/email',                           [Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/request/{token}',                  [Auth\ResetPasswordController::class, 'showResetForm'])->name('password.request.token');
Route::post('password/update',                          [Auth\ResetPasswordController::class, 'reset'])->name('password.update');
/**
 * Authentication route
 */
 Auth::routes();
 Route::get('login',                                    function() { return view('admin.error.404');})->name('login');
 Route::get('admin/login',                              function () {return redirect()->route("login");});
 Route::get('scms/login',                               [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('scms.login');
/**
 * All Ajax Routes
 */
Route::post('/getDistrict',                              [App\Http\Controllers\DropdownController::class, 'getDistrict'])->name('getDistrict'); // for get district list
Route::post('/getPalika',                                [App\Http\Controllers\DropdownController::class, 'getPalika'])->name('getPalika'); // for get palika list
Route::post('/getAccount',                               [App\Http\Controllers\DropdownController::class, 'getAccount'])->name('getAccount'); // for get account list
/**
 * Admin Dashboard Route
 */
Route::group(['prefix' => '/admin',                       'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard',                              [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');
    /**
     * Users Routes
     */
    Route::group(['prefix' => 'users',                        'as' => 'users.'], function () {
        Route::get('/',                                    [App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');
        Route::get('create',                               [App\Http\Controllers\Admin\UserController::class, 'create'])->name('create');
        Route::post('',                                    [App\Http\Controllers\Admin\UserController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                        [App\Http\Controllers\Admin\UserController::class, 'update'])->name('update');
        Route::get('/delete/{id}',                         [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('delete');
    });

    /**
     * Roles Routes
     */
    Route::group(['prefix' => 'roles',                   'as' => 'roles.'], function () {
        Route::get('/',                                  [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('index');
        Route::get('create',                             [App\Http\Controllers\Admin\RoleController::class, 'create'])->name('create');
        Route::post('',                                  [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                         [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                      [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('update');
        Route::get('/delete/{id}',                       [App\Http\Controllers\Admin\RoleController::class, 'delete'])->name('delete');
    });

    /**
     * Messages Routes
     */
    Route::group(['prefix' => 'message',                 'as' => 'message.'], function () {
        Route::get('/',                                  [App\Http\Controllers\Admin\MessageController::class, 'index'])->name('index');
        Route::get('create',                             [App\Http\Controllers\Admin\MessageController::class, 'create'])->name('create');
        Route::post('',                                  [App\Http\Controllers\Admin\MessageController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                         [App\Http\Controllers\Admin\MessageController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                      [App\Http\Controllers\Admin\MessageController::class, 'update'])->name('update');
        Route::get('/delete/{id}',                       [App\Http\Controllers\Admin\MessageController::class, 'delete'])->name('delete');
    });
    /**
     * Settings Routes
     */
    Route::group(['prefix' => 'setting',                   'as' => 'setting.'], function () {
        Route::get('/',                                    [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('index');
        Route::post('/update/{id}',                        [App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('update');

        Route::group(['prefix' => 'social',               'as' => 'social.'], function () {
            Route::get('',                                 [App\Http\Controllers\Admin\SettingsController::class, 'getSocialProfiles'])->name('index');
            Route::post('{social}',                        [App\Http\Controllers\Admin\SettingsController::class, 'updateSocialProfiles'])->name('store');
        });

        Route::group(['prefix' => 'footer',               'as' => 'footer.'], function () {
            Route::get('',                                [App\Http\Controllers\Admin\CommonController::class, 'getFooterSetting'])->name('index');
            Route::post('/update/{id}',                   [App\Http\Controllers\Admin\CommonController::class, 'updateFooterSetting'])->name('update');
        });
    });
    /**
     * User Profile Routes
     */
    Route::group(['prefix' => 'user_profile',           'as' => 'user_profile.'], function () {
        Route::get('/',                                  [App\Http\Controllers\Admin\UsersProfileController::class, 'index'])->name('index');
        Route::get('/create',                            [App\Http\Controllers\Admin\UsersProfileController::class, 'create'])->name('create');
        Route::post('',                                  [App\Http\Controllers\Admin\UsersProfileController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                         [App\Http\Controllers\Admin\UsersProfileController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                      [App\Http\Controllers\Admin\UsersProfileController::class, 'update'])->name('update');
        Route::delete('/{id}',                           [App\Http\Controllers\Admin\UsersProfileController::class, 'destroy'])->name('destroy');
        Route::get('/show}',                             [App\Http\Controllers\Admin\UsersProfileController::class, 'show'])->name('show');
        Route::post('/}',                                [App\Http\Controllers\Admin\UsersProfileController::class, 'passwordChange'])->name('passwordChange');
    });
    /**
     * Banner Routes ////
     */
    Route::group(['prefix' => 'banner',                   'as' => 'banner.'], function () {
        Route::get('/',                                    [App\Http\Controllers\Admin\BannerController::class, 'index'])->name('index');
        Route::get('/create',                              [App\Http\Controllers\Admin\BannerController::class, 'create'])->name('create');
        Route::post('',                                    [App\Http\Controllers\Admin\BannerController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\BannerController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                        [App\Http\Controllers\Admin\BannerController::class, 'update'])->name('update');
        Route::delete('/{id}',                             [App\Http\Controllers\Admin\BannerController::class, 'destroy'])->name('destroy');
        Route::get('delete_item',                          [App\Http\Controllers\Admin\BannerController::class, 'deletedPost'])->name('deleted_item');
        Route::put('restore/{id}',                         [App\Http\Controllers\Admin\BannerController::class, 'restore'])->name('restore');
        Route::delete('permanent_delete/{id}',             [App\Http\Controllers\Admin\BannerController::class, 'permanentDelete'])->name('delete');
    });

    /**
     * PopUp Routes ////
     */
    Route::group(['prefix' => 'popup',                    'as' => 'popup.'], function () {
        Route::get('/',                                    [App\Http\Controllers\Admin\PopupController::class, 'index'])->name('index');
        Route::get('/create',                              [App\Http\Controllers\Admin\PopupController::class, 'create'])->name('create');
        Route::post('',                                    [App\Http\Controllers\Admin\PopupController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\PopupController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                        [App\Http\Controllers\Admin\PopupController::class, 'update'])->name('update');
        Route::delete('/{id}',                             [App\Http\Controllers\Admin\PopupController::class, 'destroy'])->name('destroy');
    });

    /**
     * Clients Routes ////
     */
    Route::group(['prefix' => 'clients',                      'as' => 'clients.'], function () {
        Route::get('/',                                        [App\Http\Controllers\Admin\ClientsController::class, 'index'])->name('index');
        Route::get('/create',                                  [App\Http\Controllers\Admin\ClientsController::class, 'create'])->name('create');
        Route::post('',                                        [App\Http\Controllers\Admin\ClientsController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                               [App\Http\Controllers\Admin\ClientsController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                            [App\Http\Controllers\Admin\ClientsController::class, 'update'])->name('update');
        Route::delete('/{id}',                                 [App\Http\Controllers\Admin\ClientsController::class, 'destroy'])->name('destroy');
        Route::get('delete_item',                              [App\Http\Controllers\Admin\ClientsController::class, 'deletedPost'])->name('deleted_item');
        Route::put('restore/{id}',                             [App\Http\Controllers\Admin\ClientsController::class, 'restore'])->name('restore');
        Route::delete('permanent_delete/{id}',                 [App\Http\Controllers\Admin\ClientsController::class, 'permanentDelete'])->name('delete');
    }); 

    /**
     * Blog Category Routes ////
     */
    Route::group(['prefix' => 'blogcategory',                     'as' => 'blogcategory.'], function () {
        Route::get('/',                                          [App\Http\Controllers\Admin\BlogCategoryController::class, 'index'])->name('index');
        Route::get('/create',                                    [App\Http\Controllers\Admin\BlogCategoryController::class, 'create'])->name('create');
        Route::post('',                                          [App\Http\Controllers\Admin\BlogCategoryController::class, 'store'])->name('store');
        Route::get('{blogcategory}/edit/',                       [App\Http\Controllers\Admin\BlogCategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                              [App\Http\Controllers\Admin\BlogCategoryController::class, 'update'])->name('update');
        Route::delete('/{category}',                             [App\Http\Controllers\Admin\BlogCategoryController::class, 'destroy'])->name('destroy');
        /** Category Nestable Order */
        Route::post('order',                                     [App\Http\Controllers\Admin\BlogCategoryController::class, 'storeOrder'])->name('order');
    });

    /**
     * Blog POST Routes ////
     */
    Route::group(['prefix' => 'post',                           'as' => 'blog.'], function () {
        Route::get('/',                                         [App\Http\Controllers\Admin\BlogController::class, 'indexPost'])->name('index');
        Route::get('/create',                                   [App\Http\Controllers\Admin\BlogController::class, 'create'])->name('create');
        Route::post('',                                         [App\Http\Controllers\Admin\BlogController::class, 'store'])->name('store');
        Route::get('/edit/{post_unique_id}',                    [App\Http\Controllers\Admin\BlogController::class, 'editPost'])->name('edit');
        Route::post('/update/{post_unique_id}',                 [App\Http\Controllers\Admin\BlogController::class, 'update'])->name('update');
        Route::delete('/{id}',                                  [App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('destroy');

        Route::get('delete_item',                               [App\Http\Controllers\Admin\BlogController::class, 'deletedPost'])->name('deleted_item');
        Route::put('restore/{id}',                              [App\Http\Controllers\Admin\BlogController::class, 'restore'])->name('restore');
        Route::delete('permanent_delete/{id}',                  [App\Http\Controllers\Admin\BlogController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{id}',                              [App\Http\Controllers\Admin\BlogController::class, 'destroyFile'])->name('destroyFile');
    });

    /**
     * Blog Pages Routes ////
     */
    Route::group(['prefix' => 'page',                           'as' => 'page.'], function () {
        Route::get('/',                                         [App\Http\Controllers\Admin\BlogController::class, 'indexPage'])->name('index');
        Route::get('/create',                                   [App\Http\Controllers\Admin\BlogController::class, 'createPage'])->name('create');
        Route::post('',                                         [App\Http\Controllers\Admin\BlogController::class, 'storePage'])->name('store');
        Route::get('/edit/{post_unique_id}',                    [App\Http\Controllers\Admin\BlogController::class, 'editPage'])->name('edit');
        Route::post('/update/{post_unique_id}',                 [App\Http\Controllers\Admin\BlogController::class, 'updatePage'])->name('update');
        Route::delete('/{id}',                                  [App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('destroy');

        Route::get('delete_item',                               [App\Http\Controllers\Admin\BlogController::class, 'deletedPost'])->name('deleted_item');
        Route::put('restore/{id}',                              [App\Http\Controllers\Admin\BlogController::class, 'restore'])->name('restore');
        Route::delete('permanent_delete/{id}',                  [App\Http\Controllers\Admin\BlogController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{id}',                              [App\Http\Controllers\Admin\BlogController::class, 'destroyFile'])->name('destroyFile');

        Route::post('/sortabledatatable',                       [App\Http\Controllers\Admin\BlogController::class, 'updateOrder'])->name('ShortData');
    });

    /**
     * Language Routes ////
     */
    Route::group(['prefix' => 'language',                       'as' => 'language.'], function () {
        Route::get('/',                                         [App\Http\Controllers\Admin\LanguageController::class, 'index'])->name('index');
        Route::get('/create',                                   [App\Http\Controllers\Admin\LanguageController::class, 'create'])->name('create');
        Route::post('',                                         [App\Http\Controllers\Admin\LanguageController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                [App\Http\Controllers\Admin\LanguageController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                             [App\Http\Controllers\Admin\LanguageController::class, 'update'])->name('update');
        Route::delete('/{id}',                                  [App\Http\Controllers\Admin\LanguageController::class, 'destroy'])->name('destroy');
        /**Soft Delete Url */
        Route::get('delete_item',                               [App\Http\Controllers\Admin\LanguageController::class, 'deletedPost'])->name('deleted_item');
        Route::put('restore/{id}',                              [App\Http\Controllers\Admin\LanguageController::class, 'restore'])->name('restore');
        Route::delete('permanent_delete/{id}',                  [App\Http\Controllers\Admin\LanguageController::class, 'permanentDelete'])->name('delete');
    });

    /**
     * Section Routes ////
     */
    Route::group(['prefix' => 'demand-course',                          'as' => 'demand-course.'], function () {
        Route::get('/',                                           [App\Http\Controllers\Admin\DemanCourseController::class, 'index'])->name('index');
        Route::get('/create',                                     [App\Http\Controllers\Admin\DemanCourseController::class, 'create'])->name('create');
        Route::post('',                                           [App\Http\Controllers\Admin\DemanCourseController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                  [App\Http\Controllers\Admin\DemanCourseController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                               [App\Http\Controllers\Admin\DemanCourseController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\DemanCourseController::class, 'permanentDelete'])->name('destroy');

        Route::delete('permanent_delete/{id}',                     [App\Http\Controllers\Admin\DemanCourseController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{post}',                               [App\Http\Controllers\Admin\DemanCourseController::class, 'destroyFile'])->name('destroyFile');

        Route::post('/sortabledatatable',                          [App\Http\Controllers\Admin\DemanCourseController::class, 'updateOrder'])->name('ShortData');
    });

    /**
     * Offer Routes ////
     */
    Route::group(['prefix' => 'offer',                             'as' => 'offer.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\OfferController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\OfferController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\OfferController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\OfferController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\OfferController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\OfferController::class, 'permanentDelete'])->name('destroy');
        Route::post('/sortabledatatable',                          [App\Http\Controllers\Admin\OfferController::class, 'updateOrder'])->name('ShortData');
    });

    /**
     * Program Packages  Routes ////
     */
    Route::group(['prefix' => 'program',                          'as' => 'program.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\ProgramController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\ProgramController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\ProgramController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\ProgramController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\ProgramController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\ProgramController::class, 'permanentDelete'])->name('destroy');
        Route::post('/sortabledatatable',                          [App\Http\Controllers\Admin\ProgramController::class, 'updateOrder'])->name('ShortData');
    });

    /**
     * Program Packages  Routes ////
     */
    Route::group(['prefix' => 'menu',                             'as' => 'menu.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\MenusController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\MenusController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\MenusController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\MenusController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\MenusController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\MenusController::class, 'permanentDelete'])->name('destroy');
        /** Menu Nestable Order */
        Route::post('order',                                      [App\Http\Controllers\Admin\MenusController::class, 'storeOrder'])->name('order');
    });


    /**
     * Testimonials Routes ////
     */
    Route::group(['prefix' => 'testimonial',                       'as' => 'testimonial.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\TestimonialController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\TestimonialController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\TestimonialController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\TestimonialController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\TestimonialController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\TestimonialController::class, 'permanentDelete'])->name('destroy');
        Route::delete('permanent_delete/{id}',                     [App\Http\Controllers\Admin\TestimonialController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{post}',                               [App\Http\Controllers\Admin\TestimonialController::class, 'destroyFile'])->name('destroyFile');
    });

     /**
     * Interview Types Routes ////
     */
    Route::group(['prefix' => 'interviewtypes',                  'as' => 'interviewtypes.'], function () {
        Route::get('/',                                          [App\Http\Controllers\Admin\InterviewTypesController::class, 'index'])->name('index');
        Route::get('/create',                                    [App\Http\Controllers\Admin\InterviewTypesController::class, 'create'])->name('create');
        Route::post('',                                          [App\Http\Controllers\Admin\InterviewTypesController::class, 'store'])->name('store');
        Route::get('{blogcategory}/edit/',                       [App\Http\Controllers\Admin\InterviewTypesController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                              [App\Http\Controllers\Admin\InterviewTypesController::class, 'update'])->name('update');
        Route::delete('/{category}',                             [App\Http\Controllers\Admin\InterviewTypesController::class, 'destroy'])->name('destroy');
        /** Category Nestable Order */
        Route::post('order',                                     [App\Http\Controllers\Admin\InterviewTypesController::class, 'storeOrder'])->name('order');
    });

    /**
     * Interview  Question  Routes////
     */
    Route::group(['prefix' => 'interviewquestion',              'as' => 'interviewquestion.'], function () {
        Route::get('/',                                         [App\Http\Controllers\Admin\InterviewquestionController::class, 'index'])->name('index');
        Route::get('/create',                                   [App\Http\Controllers\Admin\InterviewquestionController::class, 'create'])->name('create');
        Route::post('',                                         [App\Http\Controllers\Admin\InterviewquestionController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                [App\Http\Controllers\Admin\InterviewquestionController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                             [App\Http\Controllers\Admin\InterviewquestionController::class, 'update'])->name('update');
        Route::delete('/{id}',                                  [App\Http\Controllers\Admin\InterviewquestionController::class, 'destroy'])->name('destroy');
        

        Route::get('delete_item',                               [App\Http\Controllers\Admin\InterviewquestionController::class, 'deletedPost'])->name('deleted_item');
        Route::post('/sortabledatatable',                       [App\Http\Controllers\Admin\InterviewquestionController::class, 'updateOrder'])->name('ShortData');
    });
    /**
     * Quiz Practice Routes ////
     */
    Route::group(['prefix' => 'quiz',                            'as' => 'quiz.'], function () {
        Route::get('/',                                          [App\Http\Controllers\Admin\QuizPracticeController::class, 'index'])->name('index');
        Route::get('/create',                                    [App\Http\Controllers\Admin\QuizPracticeController::class, 'create'])->name('create');
        Route::post('',                                          [App\Http\Controllers\Admin\QuizPracticeController::class, 'store'])->name('store');
        Route::get('{id}/edit/',                                 [App\Http\Controllers\Admin\QuizPracticeController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                              [App\Http\Controllers\Admin\QuizPracticeController::class, 'update'])->name('update');
        Route::delete('/{id}',                                   [App\Http\Controllers\Admin\QuizPracticeController::class, 'destroy'])->name('destroy');
        /** FAQ Nestable Order */
        Route::post('order',                                     [App\Http\Controllers\Admin\QuizPracticeController::class, 'storeOrder'])->name('order');
        Route::post('/sortabledatatable',                        [App\Http\Controllers\Admin\QuizPracticeController::class, 'updateOrder'])->name('ShortData');
    });
     /**
     * FAQ Routes ////
     */
    Route::group(['prefix' => 'faq',                            'as' => 'faq.'], function () {
        Route::get('/',                                          [App\Http\Controllers\Admin\FaqController::class, 'index'])->name('index');
        Route::get('/create',                                    [App\Http\Controllers\Admin\FaqController::class, 'create'])->name('create');
        Route::post('',                                          [App\Http\Controllers\Admin\FaqController::class, 'store'])->name('store');
        Route::get('{id}/edit/',                                [App\Http\Controllers\Admin\FaqController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                              [App\Http\Controllers\Admin\FaqController::class, 'update'])->name('update');
        Route::delete('/{id}',                                  [App\Http\Controllers\Admin\FaqController::class, 'destroy'])->name('destroy');
        /** FAQ Nestable Order */
        Route::post('order',                                     [App\Http\Controllers\Admin\FaqController::class, 'storeOrder'])->name('order');
    });
    /**
     * Staff Routes ////
     */
    Route::group(['prefix' => 'staff',                            'as' => 'staff.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\StaffController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\StaffController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\StaffController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\StaffController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\StaffController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\StaffController::class, 'permanentDelete'])->name('destroy');

        Route::delete('permanent_delete/{id}',                     [App\Http\Controllers\Admin\StaffController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{post}',                               [App\Http\Controllers\Admin\StaffController::class, 'destroyFile'])->name('destroyFile');
    });

    /**
     * Gallery Routes ////
     */
    Route::group(['prefix' => 'gallery',                           'as' => 'gallery.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\GalleryController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\GalleryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\GalleryController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\GalleryController::class, 'permanentDelete'])->name('destroy');

        Route::delete('permanent_delete/{id}',                     [App\Http\Controllers\Admin\GalleryController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{post}',                               [App\Http\Controllers\Admin\GalleryController::class, 'destroyFile'])->name('destroyFile');
    });
    /**
     * Videos Routes ////
     */
    Route::group(['prefix' => 'video',                             'as' => 'video.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\VideosController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\VideosController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\VideosController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\VideosController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\VideosController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\VideosController::class, 'permanentDelete'])->name('destroy');
    });

    /**
     * User Messages
     *
     */
    Route::group(['prefix' => 'message',                           'as' => 'message.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\ContactsController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\ContactsController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\ContactsController::class, 'store'])->name('store');
        Route::get('/show/{id}',                                   [App\Http\Controllers\Admin\ContactsController::class, 'show'])->name('show');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\ContactsController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\ContactsController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\ContactsController::class, 'permanentDelete'])->name('destroy');

        Route::delete('permanent_delete/{id}',                     [App\Http\Controllers\Admin\ContactsController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{post}',                               [App\Http\Controllers\Admin\ContactsController::class, 'destroyFile'])->name('destroyFile');
    });
});


/**
 * Front End route
 */

Route::group(['as' => 'site.', 'namespace' => 'Site'], function () {
    /**
     * Route for home page
     */
    Route::get('/',                                           [App\Http\Controllers\Site\SiteController::class, 'index'])->name('index');
    Route::get('/gallery',                                      [App\Http\Controllers\Site\SiteController::class, 'gallery'])->name('gallery');
    Route::get('/product-list',                               [App\Http\Controllers\Site\SiteController::class, 'product'])->name('product');
    Route::get('/blog',                                       [App\Http\Controllers\Site\SiteController::class, 'blog'])->name('blog');
    Route::get('/contact',                                    [App\Http\Controllers\Site\SiteController::class, 'contact'])->name('contact');
    Route::get('/about',                                      [App\Http\Controllers\Site\SiteController::class, 'aboutUs'])->name('about');
    Route::get('/staff',                                        [App\Http\Controllers\Site\SiteController::class, 'staff'])->name('staff');
    Route::get('/ourvalues',                                      [App\Http\Controllers\Site\SiteController::class, 'ourvalues'])->name('ourvalues');
    Route::get('/principles',                                    [App\Http\Controllers\Site\SiteController::class, 'principles'])->name('principles');
    Route::get('/study-abroad',                                  [App\Http\Controllers\Site\SiteController::class, 'abroad'])->name('abroad');

    Route::get('/category/{id}',                                  [App\Http\Controllers\Site\SiteController::class, 'showCategoryPost'])->name('category.show');

    /**
     * Route To show Post
     */
    Route::get('/post/{id}',                                          [App\Http\Controllers\Site\SiteController::class, 'showPost'])->name('post.show');
    /**
     * Route To show Member detail 
     */
    Route::get('/staff/{id}',                                          [App\Http\Controllers\Site\SiteController::class, 'showStaff'])->name('staff.show');
    /**
     * Route To show Page
     */
    Route::get('/page/{id}',                                          [App\Http\Controllers\Site\SiteController::class, 'showPage'])->name('page.show');

    /**
     * Route for contact Page
     */
    Route::post('/message',                                    [App\Http\Controllers\Site\SiteController::class, 'storeMessage'])->name('message');

    /**Search */

    Route::get('/search',                                     [ App\Http\Controllers\Site\SiteController::class, 'search'])->name('search');

    /**
     * Route for Donate Page
     */
    Route::post('/donate',                                    [App\Http\Controllers\Site\SiteController::class, 'Donate'])->name('donate');
});
