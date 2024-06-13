<?php
Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('index');


/**
 * General Profile Routes
 */
Route::group(['prefix' => 'general', 'as' => 'general.'], function () {
    Route::get('/',                                    [App\Http\Controllers\User\GeneralProfilesController::class, 'index'])->name('index');
    Route::get('step1',                                [App\Http\Controllers\User\GeneralProfilesController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\User\GeneralProfilesController::class, 'store'])->name('store');

    Route::get('/step1/{unique_id}',                   [App\Http\Controllers\User\GeneralProfilesController::class, 'edit'])->name('edit');
    Route::put('/step1/{unique_id}',                   [App\Http\Controllers\User\GeneralProfilesController::class, 'update'])->name('update');

    Route::get('/step2/{unique_id}',                   [App\Http\Controllers\User\GeneralProfilesController::class, 'editFamily'])->name('family-edit');
    Route::put('/step2/{unique_id}',                   [App\Http\Controllers\User\GeneralProfilesController::class, 'updateFamily'])->name('family-update');

    Route::get('/step3/{unique_id}',                   [App\Http\Controllers\User\GeneralProfilesController::class, 'editLand'])->name('land-edit');
    Route::put('/step3/{unique_id}',                   [App\Http\Controllers\User\GeneralProfilesController::class, 'updateLand'])->name('land-update');

    Route::get('/step4/{unique_id}',                   [App\Http\Controllers\User\GeneralProfilesController::class, 'editWorker'])->name('worker-edit');
    Route::put('/step4/{unique_id}',                   [App\Http\Controllers\User\GeneralProfilesController::class, 'updateWorker'])->name('worker-update');
});

/** 
 * Farm   ////
 */
Route::group(['prefix' => 'farm',                     'as' => 'farm.'], function () {
    Route::get('/',                                    [App\Http\Controllers\User\FarmController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\User\FarmController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\User\FarmController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\User\FarmController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\User\FarmController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\User\FarmController::class, 'destroy'])->name('destroy');

    Route::post('/applicantid',                        [App\Http\Controllers\User\FarmController::class, 'applicantid'])->name('applicantid');
    Route::post('/shedules',                           [App\Http\Controllers\User\FarmController::class, 'shedules'])->name('shedules');
    Route::post('/expenses',                           [App\Http\Controllers\User\FarmController::class, 'expenses'])->name('expenses');

});

 /** 
     * Report View  ////
     */
    Route::group(['prefix' => 'report',                     'as' => 'report.'], function () {
        //Profile Report
        Route::get('/',                                          [App\Http\Controllers\User\ReportController::class, 'index'])->name('index');
        Route::get('/search',                                    [App\Http\Controllers\User\ReportController::class, 'search'])->name('search');
        Route::get('/show/{id}',                                 [App\Http\Controllers\User\ReportController::class, 'show'])->name('show');
    });
