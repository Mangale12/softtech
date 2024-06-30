<?php
Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');
/**
 * Users Routes
 */
// Route::get('/dashboard', function(){
//     dd('dashboard');
// });
Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\UserController::class, 'index'])->name('index')->middleware('checkPermissions:view users');
    Route::get('create',                               [App\Http\Controllers\Admin\UserController::class, 'create'])->name('create')->middleware('checkPermissions:create users');
    Route::post('',                                    [App\Http\Controllers\Admin\UserController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('edit')->middleware('checkPermissions:edit users');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\UserController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('destroy')->middleware('checkPermissions:view users');
    Route::get('delete_item',                          [App\Http\Controllers\Admin\UserController::class, 'deletedPost'])->name('deleted_item');
    Route::put('restore/{id}',                         [App\Http\Controllers\Admin\UserController::class, 'restore'])->name('restore');
    Route::delete('permanent_delete/{id}',             [App\Http\Controllers\Admin\UserController::class, 'permanentDelete'])->name('delete');
    Route::post('/status',                             [App\Http\Controllers\Admin\UserController::class, 'status'])->name('status');
});
/** Main Setup Part
 */

/**
 * Worker Types Route ////
 */
Route::group(['prefix' => 'worker-types',             'as' => 'worker-types.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\WorkerTypesController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\WorkerTypesController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\WorkerTypesController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\WorkerTypesController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\WorkerTypesController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\WorkerTypesController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'finance-titles',             'as' => 'finance_titles.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\FinanceTitleController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\FinanceTitleController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\FinanceTitleController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\FinanceTitleController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\FinanceTitleController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\FinanceTitleController::class, 'destroy'])->name('destroy');
});

/**
 * Worker Position Route ////
 */
Route::group(['prefix' => 'worker-position',           'as' => 'worker-position.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\WorkerPositionController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\WorkerPositionController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\WorkerPositionController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\WorkerPositionController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\WorkerPositionController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\WorkerPositionController::class, 'destroy'])->name('destroy');
});
/**
 * State Month ////
 */
Route::group(['prefix' => 'worker-list',                'as' => 'worker-list.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\WorkerListController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\WorkerListController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\WorkerListController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\WorkerListController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\WorkerListController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\WorkerListController::class, 'destroy'])->name('destroy');
});

/**
 * Animals Category ////
 */
Route::group(['prefix' => 'animal-category',                'as' => 'animal-category.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\AnimalsCategoryController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\AnimalsCategoryController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\AnimalsCategoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\AnimalsCategoryController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\AnimalsCategoryController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\AnimalsCategoryController::class, 'destroy'])->name('destroy');
});

/**
 * Animals  ////
 */
Route::group(['prefix' => 'animal',                'as' => 'animal.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\AnimalsController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\AnimalsController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\AnimalsController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\AnimalsController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\AnimalsController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\AnimalsController::class, 'destroy'])->name('destroy');
});

/**
 * Agriculrure Category ////
 */
Route::group(['prefix' => 'agriculture-category',       'as' => 'agriculture-category.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\AgricultureCategoryController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\AgricultureCategoryController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\AgricultureCategoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\AgricultureCategoryController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\AgricultureCategoryController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\AgricultureCategoryController::class, 'destroy'])->name('destroy');
});
/**
 * Agriculrure  ////
 */
Route::group(['prefix' => 'agriculture',                'as' => 'agriculture.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\AgricultureController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\AgricultureController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\AgricultureController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\AgricultureController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\AgricultureController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\AgricultureController::class, 'destroy'])->name('destroy');
});


/**
 * Beema Category  ////
 */
Route::group(['prefix' => 'beema-category',                     'as' => 'beema-category.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\BeemaCategoryController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\BeemaCategoryController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\BeemaCategoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\BeemaCategoryController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\BeemaCategoryController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\BeemaCategoryController::class, 'destroy'])->name('destroy');
});

/**
 * Beema Setup  ////
 */
Route::group(['prefix' => 'beema',                     'as' => 'beema.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\BeemaController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\BeemaController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\BeemaController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\BeemaController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\BeemaController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\BeemaController::class, 'destroy'])->name('destroy');
});
/**
 * Anudaan Category ////
 */
Route::group(['prefix' => 'anudaan-category',       'as' => 'anudaan-category.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\AnudaanCategoryController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\AnudaanCategoryController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\AnudaanCategoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\AnudaanCategoryController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\AnudaanCategoryController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\AnudaanCategoryController::class, 'destroy'])->name('destroy');
});
/**
 * Beema Setup  ////
 */
Route::group(['prefix' => 'anudaan',                     'as' => 'anudaan.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\AnudaanController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\AnudaanController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\AnudaanController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\AnudaanController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\AnudaanController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\AnudaanController::class, 'destroy'])->name('destroy');
});
/**
 * Beema Setup  ////
 */
Route::group(['prefix' => 'talim',                     'as' => 'talim.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\TalimController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\TalimController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\TalimController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\TalimController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\TalimController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\TalimController::class, 'destroy'])->name('destroy');
    Route::get('add-people/{id}',                      [App\Http\Controllers\Admin\TalimController::class, 'addPeople'])->name('add_people');
    Route::get('view/{id}',                            [App\Http\Controllers\Admin\TalimController::class, 'view'])->name('view');
});
Route::group(['prefix' => 'training-person',           'as' => 'training_person.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\TrainingPersonController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\TrainingPersonController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\TrainingPersonController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\TrainingPersonController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\TrainingPersonController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\TrainingPersonController::class, 'destroy'])->name('destroy');
    Route::get('view/{id}',                            [App\Http\Controllers\Admin\TrainingPersonController::class, 'view'])->name('view');
});
/**
 * Mal bibran Setup  ////
 */
Route::group(['prefix' => 'mal-bibran',                     'as' => 'mal-bibran.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\MalBibranController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\MalBibranController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\MalBibranController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\MalBibranController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\MalBibranController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\MalBibranController::class, 'destroy'])->name('destroy');
});
/**
 * Datrinikai Setup  ////
 */
Route::group(['prefix' => 'datrinikai',                     'as' => 'datrinikai.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\DatriNikaiController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\DatriNikaiController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\DatriNikaiController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\DatriNikaiController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\DatriNikaiController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\DatriNikaiController::class, 'destroy'])->name('destroy');
    Route::get('/getdata',                             [App\Http\Controllers\Admin\DatriNikaiController::class, 'getData'])->name('getData');
});

/**
 * BiuBijan Setup  ////
 */
Route::group(['prefix' => 'biu-bijan',                     'as' => 'biu-bijan.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\BiuBijanController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\BiuBijanController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\BiuBijanController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\BiuBijanController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\BiuBijanController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\BiuBijanController::class, 'destroy'])->name('destroy');
});
/**
 * Mesinary Setup  ////
 */
Route::group(['prefix' => 'mesinary',                     'as' => 'mesinary.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\MesinaryController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\MesinaryController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\MesinaryController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\MesinaryController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\MesinaryController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\MesinaryController::class, 'destroy'])->name('destroy');
});

/**
 * Sangrachana Setup  ////
 */
Route::group(['prefix' => 'sangrachana',                     'as' => 'sangrachana.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\SangrachanaController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\SangrachanaController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\SangrachanaController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\SangrachanaController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\SangrachanaController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\SangrachanaController::class, 'destroy'])->name('destroy');
});

/**
 * Ecommenr Product Cateogry Setup  ////
 */
Route::group(['prefix' => 'category',                     'as' => 'category.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('destroy');
});
/**
 * Fiscal Year Setup  ////
 */
Route::group(['prefix' => 'fiscal',                     'as' => 'fiscal.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\FiscalController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\FiscalController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\FiscalController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\FiscalController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\FiscalController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\FiscalController::class, 'destroy'])->name('destroy');
    Route::get('/fiscal/getdata',                      [App\Http\Controllers\Admin\FiscalController::class, 'getData'])->name('getData');
});

/**
 * Unit Setup  ////
 */
Route::group(['prefix' => 'unit',                     'as' => 'unit.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\UnitController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\UnitController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\UnitController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\UnitController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\UnitController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\UnitController::class, 'destroy'])->name('destroy');
    Route::get('/fiscal/getdata',                      [App\Http\Controllers\Admin\UnitController::class, 'getData'])->name('getData');
});
// other material route
Route::group(['prefix' => 'other-material',                     'as' => 'other_material.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\OtherMaterialController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\OtherMaterialController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\OtherMaterialController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\OtherMaterialController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\OtherMaterialController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\OtherMaterialController::class, 'destroy'])->name('destroy');
    Route::get('/fiscal/getdata',                      [App\Http\Controllers\Admin\OtherMaterialController::class, 'getData'])->name('getData');
});
Route::group(['prefix' => 'new-farm',                     'as' => 'farms.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\NewFarmController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\NewFarmController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\NewFarmController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\NewFarmController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\NewFarmController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\NewFarmController::class, 'destroy'])->name('destroy');
    Route::get('/view/{id}',                           [App\Http\Controllers\Admin\NewFarmController::class, 'view'])->name('view');
    Route::get('/show/{unique_id}',                    [App\Http\Controllers\Admin\FarmController::class, 'index'])->name('show');
    Route::get('/fiscal/getdata',                      [App\Http\Controllers\Admin\NewFarmController::class, 'getData'])->name('getData');
});

/**
 * Block Setup  ////
 */
Route::group(['prefix' => 'block',                     'as' => 'block.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\BlockController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\BlockController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\BlockController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\BlockController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\BlockController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\BlockController::class, 'destroy'])->name('destroy');
});



/**
 * Ecommenr Product Cateogry Setup  ////
 */
Route::group(['prefix' => 'farm',                     'as' => 'farm.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\FarmController::class, 'index'])->name('index');
    Route::post('/applicantid',                        [App\Http\Controllers\Admin\FarmController::class, 'applicantid'])->name('applicantid');
    Route::get('/create/{unique_id}',                              [App\Http\Controllers\Admin\FarmController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\FarmController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\FarmController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\FarmController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\FarmController::class, 'destroy'])->name('destroy');
    Route::post('add-mesinary/{id}',                   [App\Http\Controllers\Admin\FarmController::class, 'add_mesinary'])->name('add_mesinary');
    Route::post('add-anya/{id}',                       [App\Http\Controllers\Admin\FarmController::class, 'add_anya'])->name('add_anya');
    Route::post('add-worker/{id}',                     [App\Http\Controllers\Admin\FarmController::class, 'add_worker'])->name('add_worker');
    Route::post('add-amdani/{id}',                     [App\Http\Controllers\Admin\FarmController::class, 'add_amdani'])->name('add_amdani');

    Route::get('delete-mesinary/{id}',                [App\Http\Controllers\Admin\FarmController::class, 'delete_mesinary'])->name('delete_mesinary');
    Route::get('delete-worker/{id}',                [App\Http\Controllers\Admin\FarmController::class, 'delete_worker'])->name('delete_worker');


    Route::get('/view-report/{id}',                    [App\Http\Controllers\Admin\FarmController::class, 'view_report'])->name('view');
    Route::get('/view_bibaran/{id}',                   [App\Http\Controllers\Admin\FarmController::class, 'view'])->name('view_bibaran');

    Route::post('/karyatalika',                        [App\Http\Controllers\Admin\FarmController::class, 'karyatalika'])->name('karyatalika');
    Route::delete('destroy_karyatalika/{id}',          [App\Http\Controllers\Admin\FarmController::class, 'destroy_karyatalika'])->name('destroy_karyatalika');

    Route::post('/expenses',                           [App\Http\Controllers\Admin\FarmController::class, 'expenses'])->name('expenses');
    Route::delete('destroy_expenses/{id}',             [App\Http\Controllers\Admin\FarmController::class, 'destroy_expenses'])->name('destroy_expenses');



    Route::post('/shedules',                           [App\Http\Controllers\Admin\FarmController::class, 'shedules'])->name('shedules');
    Route::post('/expenses',                           [App\Http\Controllers\Admin\FarmController::class, 'expenses'])->name('expenses');
});

/**
 * Animal Farm Route  ////
 */
Route::group(['prefix' => 'animal_farm',               'as' => 'animal_farm.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\AnimalFarmController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\AnimalFarmController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\AnimalFarmController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\AnimalFarmController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\AnimalFarmController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\AnimalFarmController::class, 'destroy'])->name('destroy');
    Route::get('/view/{id}',                           [App\Http\Controllers\Admin\AnimalFarmController::class, 'view'])->name('view');
});

Route::group(['prefix' => 'farm-amdani',               'as' => 'farm_amdani.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\FarmAmdaniController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\FarmAmdaniController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\FarmAmdaniController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\FarmAmdaniController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\FarmAmdaniController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\FarmAmdaniController::class, 'destroy'])->name('destroy');
    Route::get('/view/{id}',                           [App\Http\Controllers\Admin\FarmAmdaniController::class, 'view'])->name('view');
});

/**
 * Report View  ////
 */
Route::group(['prefix' => 'report',                     'as' => 'report.'], function () {
    //Profile Report
    Route::get('/profile',                                         [App\Http\Controllers\Admin\ReportController::class, 'index'])->name('index');
    Route::get('/profile/search',                                  [App\Http\Controllers\Admin\ReportController::class, 'search'])->name('search');
    Route::get('/show-profile/{unique_id}',                        [App\Http\Controllers\Admin\ReportController::class, 'show'])->name('show');

    //Farm Report
    Route::get('/farm',                                         [App\Http\Controllers\Admin\ReportController::class, 'Farm_index'])->name('farm_index');
    Route::get('/farm/search',                                  [App\Http\Controllers\Admin\ReportController::class, 'Farm_search'])->name('farm_search');
    Route::get('/show-farm/{id}',                               [App\Http\Controllers\Admin\ReportController::class, 'showFarm'])->name('show_farm');

    //Anudaan Report
    Route::get('/anudaan',                                      [App\Http\Controllers\Admin\ReportController::class, 'Anudaan_index'])->name('anudaan_index');
    Route::get('/anudaan/search',                               [App\Http\Controllers\Admin\ReportController::class, 'Anudaan_search'])->name('anudaan_search');
    Route::get('/show-anudaan/{id}',                            [App\Http\Controllers\Admin\ReportController::class, 'showAnudaan'])->name('show_anudaan');

    //Talim Report
    Route::get('/talim',                                      [App\Http\Controllers\Admin\ReportController::class, 'Talim_index'])->name('talim_index');
    Route::get('/talim/search',                               [App\Http\Controllers\Admin\ReportController::class, 'Talim_search'])->name('talim_search');
    Route::get('/show-talim/{id}',                            [App\Http\Controllers\Admin\ReportController::class, 'showTalim'])->name('show_talim');

    //Datrinikai Report
    Route::get('/datrinikai',                                  [App\Http\Controllers\Admin\ReportController::class, 'Datrinikai_index'])->name('datrinikai_index');
    Route::get('/datrinikai/search',                           [App\Http\Controllers\Admin\ReportController::class, 'Datrinikai_search'])->name('datrinikai_search');
    Route::get('/show-datrinikai/{id}',                        [App\Http\Controllers\Admin\ReportController::class, 'showDatrinikai'])->name('show_datrinikai');

    //Beema Report
    Route::get('/beema',                                      [App\Http\Controllers\Admin\ReportController::class, 'Beema_index'])->name('beema_index');
    Route::get('/beema/search',                               [App\Http\Controllers\Admin\ReportController::class, 'Beema_search'])->name('beema_search');
    Route::get('/show-beema/{id}',                            [App\Http\Controllers\Admin\ReportController::class, 'showBeema'])->name('show_beema');

    //Sangrachana Report
    Route::get('/sangrachana',                                  [App\Http\Controllers\Admin\ReportController::class, 'Sangrachana_index'])->name('sangrachana_index');
    Route::get('/sangrachana/search',                           [App\Http\Controllers\Admin\ReportController::class, 'Sangrachana_search'])->name('sangrachana_search');
    Route::get('/show-sangrachana/{id}',                        [App\Http\Controllers\Admin\ReportController::class, 'showSangrachana'])->name('show_sangrachana');

    //Mesinary Report
    Route::get('/mesinary',                                  [App\Http\Controllers\Admin\ReportController::class, 'Mesinary_index'])->name('mesinary_index');
    Route::get('/mesinary/search',                           [App\Http\Controllers\Admin\ReportController::class, 'Mesinary_search'])->name('mesinary_search');
    Route::get('/show-mesinary/{id}',                        [App\Http\Controllers\Admin\ReportController::class, 'showMesinary'])->name('show_mesinary');

    //biu-bijan Report
    Route::get('/biu-bijan',                                  [App\Http\Controllers\Admin\ReportController::class, 'BiuBijan_index'])->name('biubijan_index');
    Route::get('/biu-bijan/search',                           [App\Http\Controllers\Admin\ReportController::class, 'BiuBijan_search'])->name('biubijan_search');
    Route::get('/show-biu-bijan/{id}',                        [App\Http\Controllers\Admin\ReportController::class, 'showBiuBijan'])->name('show_biubijan');

    //animal Report
    Route::get('/animal',                                     [App\Http\Controllers\Admin\ReportController::class, 'Animal_index'])->name('animal_index');
    Route::get('/animal/search',                              [App\Http\Controllers\Admin\ReportController::class, 'Animal_search'])->name('animal_search');
    Route::get('/show-animal/{id}',                           [App\Http\Controllers\Admin\ReportController::class, 'showAnimal'])->name('show_animal');

    //Agriculture Report
    Route::get('/agriculture',                                     [App\Http\Controllers\Admin\ReportController::class, 'Agriculture_index'])->name('agriculture_index');
    Route::get('/agriculture/search',                              [App\Http\Controllers\Admin\ReportController::class, 'Agriculture_search'])->name('agriculture_search');
    Route::get('/show-agriculture/{id}',                           [App\Http\Controllers\Admin\ReportController::class, 'showAgriculture'])->name('show_agriculture');


    Route::get('/low-stock/',                                      [App\Http\Controllers\Admin\ReportController::class, 'lowStock'])->name('low_stock');
});
/**
 * General Profile Routes
 */
Route::group(['prefix' => 'general', 'as' => 'general.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\GeneralProfilesController::class, 'index'])->name('index');
    // Route::get('step1',                                [App\Http\Controllers\Admin\GeneralProfilesController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\GeneralProfilesController::class, 'store'])->name('store');

    Route::get('/step1/{unique_id}',                   [App\Http\Controllers\Admin\GeneralProfilesController::class, 'edit'])->name('edit');
    Route::put('/step1/{unique_id}',                   [App\Http\Controllers\Admin\GeneralProfilesController::class, 'update'])->name('update');

    Route::get('/step2/{unique_id}',                   [App\Http\Controllers\Admin\GeneralProfilesController::class, 'editFamily'])->name('family-edit');
    Route::put('/step2/{unique_id}',                   [App\Http\Controllers\Admin\GeneralProfilesController::class, 'updateFamily'])->name('family-update');

    Route::get('/step3/{unique_id}',                   [App\Http\Controllers\Admin\GeneralProfilesController::class, 'editLand'])->name('land-edit');
    Route::put('/step3/{unique_id}',                   [App\Http\Controllers\Admin\GeneralProfilesController::class, 'updateLand'])->name('land-update');
    Route::post('/storeLand',                           [App\Http\Controllers\Admin\GeneralProfilesController::class, 'storeLand'])->name('storeLand');
    Route::delete('destroy_land/{id}',                 [App\Http\Controllers\Admin\GeneralProfilesController::class, 'destroyLand'])->name('destroyLand');



    Route::get('/step4/{unique_id}',                   [App\Http\Controllers\Admin\GeneralProfilesController::class, 'editWorker'])->name('worker-edit');
    Route::put('/step4/{unique_id}',                   [App\Http\Controllers\Admin\GeneralProfilesController::class, 'updateWorker'])->name('worker-update');
    Route::post('/storeWorker',                           [App\Http\Controllers\Admin\GeneralProfilesController::class, 'storeWorker'])->name('storeWorker');
    Route::delete('destroy_Worker/{id}',                 [App\Http\Controllers\Admin\GeneralProfilesController::class, 'destroyWorker'])->name('destroyWorker');



    Route::delete('/{id}',                             [App\Http\Controllers\Admin\GeneralProfilesController::class, 'destroy'])->name('destroy');
    Route::get('delete_item',                          [App\Http\Controllers\Admin\GeneralProfilesController::class, 'deletedPost'])->name('deleted_item');
    Route::put('restore/{id}',                         [App\Http\Controllers\Admin\GeneralProfilesController::class, 'restore'])->name('restore');
    Route::delete('permanent_delete/{id}',             [App\Http\Controllers\Admin\GeneralProfilesController::class, 'permanentDelete'])->name('delete');
    Route::post('/status',                             [App\Http\Controllers\Admin\GeneralProfilesController::class, 'status'])->name('status');
});
/**
 * Roles Routes
 */
Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
    Route::get('/',                             [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('index')->middleware('checkPermissions:view role');
    Route::get('create',                        [App\Http\Controllers\Admin\RoleController::class, 'create'])->name('create')->middleware('checkPermissions:create role');
    Route::post('',                             [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('store')->middleware('checkPermissions:create role');
    Route::get('/edit/{id}',                    [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('edit')->middleware('checkPermissions:edit role');
    Route::post('/update/{id}',                 [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('update')->middleware('checkPermissions:edit role');
    Route::delete('/delete/{id}',                  [App\Http\Controllers\Admin\RoleController::class, 'delete'])->name('destroy')->middleware('checkPermissions:create role');
});
/**
 * Permission Routes
 */
Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {
    Route::get('/',                             [App\Http\Controllers\Admin\PermissionController::class, 'index'])->name('index');
    Route::get('create',                        [App\Http\Controllers\Admin\PermissionController::class, 'create'])->name('create');
    Route::post('',                             [App\Http\Controllers\Admin\PermissionController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                    [App\Http\Controllers\Admin\PermissionController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                 [App\Http\Controllers\Admin\PermissionController::class, 'update'])->name('update');
    Route::delete('/delete/{id}',                  [App\Http\Controllers\Admin\PermissionController::class, 'delete'])->name('destroy');
});

/**
 * Messages Routes
 */
Route::group(['prefix' => 'message', 'as' => 'message.'], function () {
    Route::get('/',                             [App\Http\Controllers\Admin\MessageController::class, 'index'])->name('index');
    Route::get('create',                        [App\Http\Controllers\Admin\MessageController::class, 'create'])->name('create');
    Route::post('',                             [App\Http\Controllers\Admin\MessageController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                    [App\Http\Controllers\Admin\MessageController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                 [App\Http\Controllers\Admin\MessageController::class, 'update'])->name('update');
    Route::get('/delete/{id}',                  [App\Http\Controllers\Admin\MessageController::class, 'delete'])->name('delete');
});


/**
 * Settings Routes
 */
Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
    Route::get('/',                             [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('index');
    Route::post('/update/{id}',                 [App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('update');

    Route::group(['prefix' => 'social', 'as' => 'social.'], function () {
        Route::get('',                       [App\Http\Controllers\Admin\SettingsController::class, 'getSocialProfiles'])->name('index');
        Route::post('{social}',              [App\Http\Controllers\Admin\SettingsController::class, 'updateSocialProfiles'])->name('store');
    });
});

/**
 * User Profile Routes
 */
Route::group(['prefix' => 'user_profile', 'as' => 'user_profile.'], function () {
    Route::get('/',                          [App\Http\Controllers\Admin\UsersProfileController::class, 'index'])->name('index');
    Route::get('/create',                    [App\Http\Controllers\Admin\UsersProfileController::class, 'create'])->name('create');
    Route::post('',                          [App\Http\Controllers\Admin\UsersProfileController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                 [App\Http\Controllers\Admin\UsersProfileController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',              [App\Http\Controllers\Admin\UsersProfileController::class, 'update'])->name('update');
    Route::delete('/{id}',                   [App\Http\Controllers\Admin\UsersProfileController::class, 'destroy'])->name('destroy');
    Route::get('/show}',                     [App\Http\Controllers\Admin\UsersProfileController::class, 'show'])->name('show');
    Route::post('/}',                        [App\Http\Controllers\Admin\UsersProfileController::class, 'passwordChange'])->name('passwordChange');
});


/**
 * Inventory SETUP
 *  Land Setup  ////
 */
Route::group(['prefix' => 'lnventory_land_category',  'as' => 'lnventory_land_category.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\InventoryLandCategoryController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\InventoryLandCategoryController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\InventoryLandCategoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\InventoryLandCategoryController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\InventoryLandCategoryController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\InventoryLandCategoryController::class, 'destroy'])->name('destroy');
});

/**
 * Inventory SETUP
 *  STORE Setup  ////
 */
Route::group(['prefix' => 'lnventory_store_category',  'as' => 'lnventory_store_category.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\InventoryStoreCategoryController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\InventoryStoreCategoryController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\InventoryStoreCategoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\InventoryStoreCategoryController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\InventoryStoreCategoryController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\InventoryStoreCategoryController::class, 'destroy'])->name('destroy');
});

/**
 * Inventory SETUP
 *  EQUIPMENT Item Setup  ////
 */
Route::group(['prefix' => 'lnventory_equipment_category',  'as' => 'lnventory_equipment_category.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\InventoryEquipmentCategoryController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\InventoryEquipmentCategoryController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\InventoryEquipmentCategoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\InventoryEquipmentCategoryController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\InventoryEquipmentCategoryController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\InventoryEquipmentCategoryController::class, 'destroy'])->name('destroy');
});

/**
 * Inventory SETUP
 *  irrigation Item Setup  ////
 */
Route::group(['prefix' => 'lnventory_irrigation_category',  'as' => 'lnventory_irrigation_category.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\InventoryIrrigationCategoryController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\InventoryIrrigationCategoryController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\InventoryIrrigationCategoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\InventoryIrrigationCategoryController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\InventoryIrrigationCategoryController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\InventoryIrrigationCategoryController::class, 'destroy'])->name('destroy');
});
/**
 * Inventory SETUP
 *  FEUL Item Setup  ////
 */
Route::group(['prefix' => 'lnventory_feul_category',  'as' => 'lnventory_feul_category.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\InventoryFuelCategoryController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\InventoryFuelCategoryController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\InventoryFuelCategoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\InventoryFuelCategoryController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\InventoryFuelCategoryController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\InventoryFuelCategoryController::class, 'destroy'])->name('destroy');
});

/**
 * Inventory
 *  PROPERTY ROUTE  ////
 */
Route::group(['prefix' => 'property',  'as' => 'property.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\PropertyController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\PropertyController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\PropertyController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\PropertyController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\PropertyController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\PropertyController::class, 'destroy'])->name('destroy');
});

/**
 * Inventory
 *  Udhyog ROUTE  ////
 */

Route::group(['prefix' => 'udhyog',  'as' => 'udhyog.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\UdhyogController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\UdhyogController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\UdhyogController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\UdhyogController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\UdhyogController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\UdhyogController::class, 'destroy'])->name('destroy');

    Route::get('/Getdata',                             [App\Http\Controllers\Admin\UdhyogController::class, 'Getdata'])->name('Getdata');
    Route::group(['middleware' => ['auth', 'checkUdhyogAccess:Achar']], function () {
        Route::group(['prefix' => 'achar',  'as' => 'achar.'], function (){
        Route::get('/',                                    [App\Http\Controllers\Admin\UdhyogAcharController::class, 'index'])->name('index');
        Route::get('/create',                                    [App\Http\Controllers\Admin\UdhyogAcharController::class, 'create'])->name('create');
        Route::post('',                                    [App\Http\Controllers\Admin\UdhyogAcharController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                    [App\Http\Controllers\Admin\UdhyogAcharController::class, 'edit'])->name('edit');
        Route::get('/update/{id}',                                    [App\Http\Controllers\Admin\UdhyogAcharController::class, 'update'])->name('update');
        Route::get('/{id}',                                    [App\Http\Controllers\Admin\UdhyogAcharController::class, 'destroy'])->name('destroy');
        Route::get('orders/{id}',                                    [App\Http\Controllers\Admin\UdhyogAcharController::class, 'orders'])->name('orders');

        Route::group(['prefix' => 'fianance',  'as' => 'fianance.'], function (){
            Route::get('/index',                                    [App\Http\Controllers\Admin\UdhyogAcharController::class, 'fianance'])->name('index');
            Route::get('/create',                                    [App\Http\Controllers\Admin\UdhyogAcharController::class, 'fianance_create'])->name('create');
            Route::post('',                                    [App\Http\Controllers\Admin\UdhyogAcharController::class, 'store'])->name('store');
            Route::group(['middleware' => ['checkEntityAccess:fianance,id']], function () {
                Route::get('/view-report/{id}',                                    [App\Http\Controllers\Admin\VoucherController::class, 'viewReport'])->name('view_report');
                Route::get('/edit/{id}',                                    [App\Http\Controllers\Admin\UdhyogAcharController::class, 'edit'])->name('edit');
                Route::get('/update/{id}',                                    [App\Http\Controllers\Admin\UdhyogAcharController::class, 'update'])->name('update');
                Route::get('/{id}',                                    [App\Http\Controllers\Admin\UdhyogAcharController::class, 'destroy'])->name('destroy');

            });
        });

        Route::group(['prefix' => 'workers',  'as' => 'workers.'], function (){
            Route::get('/workers-type',                                    [App\Http\Controllers\Admin\UdhyogAcharController::class, 'workersType'])->name('workerstype.index');
            Route::get('/workers-type/create',                             [App\Http\Controllers\Admin\UdhyogAcharController::class, 'workersTypeCreate'])->name('workerstype.create');
            Route::post('/workers-type/store',                             [App\Http\Controllers\Admin\UdhyogAcharController::class, 'workersTypeStore'])->name('workerstype.store');

            Route::get('/workers-position',                                    [App\Http\Controllers\Admin\UdhyogAcharController::class, 'workersPosition'])->name('workersposition.index');
            Route::get('/workers-position/create',                             [App\Http\Controllers\Admin\UdhyogAcharController::class, 'workersPositionCreate'])->name('workersposition.create');
            Route::post('/workers-position/store',                             [App\Http\Controllers\Admin\UdhyogAcharController::class, 'workersPositionStore'])->name('workersposition.store');

            Route::get('/workers-list',                                    [App\Http\Controllers\Admin\UdhyogAcharController::class, 'workersList'])->name('workerslist.index');
            Route::get('/workers-list/create',                             [App\Http\Controllers\Admin\UdhyogAcharController::class, 'workersListCreate'])->name('workerslist.create');
            Route::post('/workers-list/store',                             [App\Http\Controllers\Admin\UdhyogAcharController::class, 'workersListStore'])->name('workerslist.store');

            Route::get('/create',                                          [App\Http\Controllers\Admin\UdhyogAcharController::class, 'workers_create'])->name('create');
            Route::group(['prefix' => 'fianance',  'as' => 'fianance.'], function (){

                Route::get('/edit/{id}',                                       [App\Http\Controllers\Admin\UdhyogAcharController::class, 'edit'])->name('edit');
                Route::get('/update/{id}',                                     [App\Http\Controllers\Admin\UdhyogAcharController::class, 'update'])->name('update');
                Route::get('/{id}',                                            [App\Http\Controllers\Admin\UdhyogAcharController::class, 'destroy'])->name('destroy');

            });
        });
        //achar inventory route

        Route::group(['prefix' => 'inventory', 'as' => 'inventory.'], function () {
            Route::group(['prefix' => 'suppliers', 'as' => 'suppliers.'], function () {
                Route::get('/',                                     [App\Http\Controllers\Admin\SupplierController::class, 'index'])->name('index');
                Route::get('/create',                               [App\Http\Controllers\Admin\SupplierController::class, 'create'])->name('create');
                Route::post('',                                     [App\Http\Controllers\Admin\SupplierController::class, 'store'])->name('store');
                Route::group(['middleware' => ['checkEntityAccess:supplier,id']], function () {
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SupplierController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\SupplierController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\SupplierController::class, 'destroy'])->name('destroy');
                    Route::get('view/{id}',                             [App\Http\Controllers\Admin\SupplierController::class, 'view'])->name('view');
                    Route::get('view-details/{id}',                     [App\Http\Controllers\Admin\SupplierController::class, 'view_details'])->name('view_details');

                });
            });
            Route::group(['prefix' => 'supplier-payment', 'as' => 'supplier_payment.'], function () {
                // Route::get('/{$transaction_key}',                   function(){
                //     dd("ll");
                // })->name('index');
                Route::get('/{transaction_key}',                   [App\Http\Controllers\Admin\PaymentController::class, 'index'])->name('index');
                Route::get('/create/{transaction_key}',             [App\Http\Controllers\Admin\PaymentController::class, 'create'])->name('create');
                Route::post('',                                     [App\Http\Controllers\Admin\SupplierController::class, 'store'])->name('store');
                Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SupplierController::class, 'edit'])->name('edit');
                Route::post('update/{id}',                          [App\Http\Controllers\Admin\SupplierController::class, 'update'])->name('update');
                // Route::delete('/{id}',                              [App\Http\Controllers\Admin\SupplierController::class, 'destroy'])->name('destroy');
            });
            Route::group(['prefix' => 'raw-materials', 'as' => 'raw_materials.'], function () {
                Route::get('/',                                     [App\Http\Controllers\Admin\RawMaterialController::class, 'index'])->name('index');
                Route::get('/create',                               [App\Http\Controllers\Admin\RawMaterialController::class, 'create'])->name('create');
                Route::post('',                                     [App\Http\Controllers\Admin\RawMaterialController::class, 'store'])->name('store');
                Route::group(['middleware' => ['checkEntityAccess:rawmaterial,id']], function () {
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\RawMaterialController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\RawMaterialController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\RawMaterialController::class, 'destroy'])->name('destroy');
                    Route::get('/inventory',                            [App\Http\Controllers\Admin\RawMaterialController::class, 'inventory'])->name('inventory');
                    Route::get('/low-stock',                            [App\Http\Controllers\Admin\RawMaterialController::class, 'lowStock'])->name('low_stock');
                });
            });

            Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
                Route::get('/',                                     [App\Http\Controllers\Admin\InventoryProductController::class, 'index'])->name('index');
                Route::get('/create',                               [App\Http\Controllers\Admin\InventoryProductController::class, 'create'])->name('create');
                Route::post('',                                     [App\Http\Controllers\Admin\InventoryProductController::class, 'store'])->name('store');
                Route::group(['middleware' => ['checkEntityAccess:product,id']], function () {
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\InventoryProductController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\InventoryProductController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\InventoryProductController::class, 'destroy'])->name('destroy');
                });
                Route::get('/low-stock',                                [App\Http\Controllers\Admin\InventoryProductController::class, 'lowStock'])->name('low_stock');
                Route::get('/inventory',                                [App\Http\Controllers\Admin\InventoryProductController::class, 'inventory'])->name('inventory');

            });

            Route::group(['prefix' => 'production-batch', 'as' => 'production_batch.'], function () {
                Route::get('/',                                     [App\Http\Controllers\Admin\ProductionBatchController::class, 'index'])->name('index');
                Route::get('/create',                               [App\Http\Controllers\Admin\ProductionBatchController::class, 'create'])->name('create');
                Route::post('',                                     [App\Http\Controllers\Admin\ProductionBatchController::class, 'store'])->name('store');
                Route::group(['middleware' => ['checkEntityAccess:production_batch,id']], function () {

                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\ProductionBatchController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\ProductionBatchController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\ProductionBatchController::class, 'destroy'])->name('destroy');
                    Route::get('/view-report/{id}',                     [App\Http\Controllers\Admin\ProductionBatchController::class, 'view_report'])->name('view_report');
                });
                Route::get('/stock-quantity',                       [App\Http\Controllers\Admin\ProductionBatchController::class, 'stockQuantity'])->name('stock_quantity');
                Route::get('/view-alert',                           [App\Http\Controllers\Admin\ProductionBatchController::class, 'getExpiringProducts'])->name('view_alert');

            });

            Route::group(['prefix' => 'damage-records', 'as' => 'damage_records.'], function () {
                Route::get('/',                                     [App\Http\Controllers\Admin\DamageRecordController::class, 'index'])->name('index');
                Route::get('/create',                               [App\Http\Controllers\Admin\DamageRecordController::class, 'create'])->name('create');
                Route::post('',                                     [App\Http\Controllers\Admin\DamageRecordController::class, 'store'])->name('store');
                Route::group(['middleware' => ['checkEntityAccess:damage_record,id']], function () {
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\DamageRecordController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\DamageRecordController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\DamageRecordController::class, 'destroy'])->name('destroy');
                });
                Route::get('/stock-quantity',                    [App\Http\Controllers\Admin\DamageRecordController::class, 'stockQuantity'])->name('stock_quantity');
                Route::get('/check-production-batch',                    [App\Http\Controllers\Admin\DamageRecordController::class, 'checkProductionBatch'])->name('check_production_batch');

            });

            Route::group(['prefix' => 'damage-types', 'as' => 'damage_types.'], function () {
                Route::get('/',                                     [App\Http\Controllers\Admin\DamageTypeController::class, 'index'])->name('index');
                Route::get('/create',                               [App\Http\Controllers\Admin\DamageTypeController::class, 'create'])->name('create');
                Route::post('',                                     [App\Http\Controllers\Admin\DamageTypeController::class, 'store'])->name('store');
                Route::get('edit/{id}',                             [App\Http\Controllers\Admin\DamageTypeController::class, 'edit'])->name('edit');
                Route::post('update/{id}',                          [App\Http\Controllers\Admin\DamageTypeController::class, 'update'])->name('update');
                Route::delete('/{id}',                              [App\Http\Controllers\Admin\DamageTypeController::class, 'destroy'])->name('destroy');
            });

            Route::group(['prefix' => 'raw-material-name', 'as' => 'raw_material_name.'], function () {
                Route::get('/',                                     [App\Http\Controllers\Admin\RawMaterialNameController::class, 'index'])->name('index');
                Route::get('/create',                               [App\Http\Controllers\Admin\RawMaterialNameController::class, 'create'])->name('create');
                Route::post('',                                     [App\Http\Controllers\Admin\RawMaterialNameController::class, 'store'])->name('store');
                Route::group(['middleware' => ['checkEntityAccess:rawmaterial_name,id']], function () {

                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\RawMaterialNameController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\RawMaterialNameController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\RawMaterialNameController::class, 'destroy'])->name('destroy');
                });
                Route::get('/test',                                 [App\Http\Controllers\Admin\RawMaterialNameController::class, 'convertToNepali'])->name('convertToNepali');
            });

            Route::group(['prefix' => 'dealers', 'as' => 'dealers.'], function () {
                Route::get('/',                                     [App\Http\Controllers\Admin\DealerController::class, 'index'])->name('index');
                Route::get('/create',                               [App\Http\Controllers\Admin\DealerController::class, 'create'])->name('create');
                Route::post('',                                     [App\Http\Controllers\Admin\DealerController::class, 'store'])->name('store');
                Route::group(['middleware' => ['checkEntityAccess:rawmaterial_name,id']], function () {
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\DealerController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\DealerController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\DealerController::class, 'destroy'])->name('destroy');
                    Route::get('/test',                                 [App\Http\Controllers\Admin\DealerController::class, 'convertToNepali'])->name('convertToNepali');
                    Route::get('/view/{id}',                            [App\Http\Controllers\Admin\DealerController::class, 'view'])->name('view');
                    Route::get('/orders/{id}',                          [App\Http\Controllers\Admin\DealerController::class, 'orders'])->name('orders');
                    Route::get('/view-details/{id}',                     [App\Http\Controllers\Admin\DealerController::class, 'view_details'])->name('view_details');

                });
            });

            Route::group(['prefix' => 'sales_orders', 'as' => 'sales_orders.'], function () {
                Route::get('/',                                     [App\Http\Controllers\Admin\SalesOrderController::class, 'index'])->name('index');
                Route::get('/create',                               [App\Http\Controllers\Admin\SalesOrderController::class, 'create'])->name('create');
                Route::post('',                                     [App\Http\Controllers\Admin\SalesOrderController::class, 'store'])->name('store');
                Route::group(['middleware' => ['checkEntityAccess:rawmaterial_name,id']], function () {

                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SalesOrderController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\SalesOrderController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\SalesOrderController::class, 'destroy'])->name('destroy');
                    Route::get('/view/{id}',                                 [App\Http\Controllers\Admin\SalesOrderController::class, 'view'])->name('view');

                });
            });
        });
    });
});
    Route::group(['middleware' => ['auth', 'checkUdhyogAccess:alu chips']], function () {
        Route::group(['prefix' => 'aluchips',  'as' => 'aluchips.'], function (){
            Route::group(['prefix' => 'fianance',  'as' => 'fianance.'], function (){
                Route::get('/index',                                    [App\Http\Controllers\Admin\UdhyogAluChipsController::class, 'fianance'])->name('index');
                Route::get('/view-report/{id}',                                    [App\Http\Controllers\Admin\VoucherController::class, 'viewReport'])->name('view_report');
                Route::get('/create',                                    [App\Http\Controllers\Admin\UdhyogAluChipsController::class, 'fianance_create'])->name('create');
                Route::post('',                                    [App\Http\Controllers\Admin\UdhyogAluChipsController::class, 'store'])->name('store');
                Route::get('/edit/{id}',                                    [App\Http\Controllers\Admin\UdhyogAluChipsController::class, 'edit'])->name('edit');
                Route::get('/update/{id}',                                    [App\Http\Controllers\Admin\UdhyogAluChipsController::class, 'update'])->name('update');
                Route::get('/{id}',                                    [App\Http\Controllers\Admin\UdhyogAluChipsController::class, 'destroy'])->name('destroy');
            });

            Route::group(['prefix' => 'workers',  'as' => 'workers.'], function (){
                Route::get('/workers-list',                                    [App\Http\Controllers\Admin\UdhyogAluChipsController::class, 'workersList'])->name('workersList');
                Route::get('/workers-type',                                    [App\Http\Controllers\Admin\UdhyogAluChipsController::class, 'workersType'])->name('workerstype.index');
                Route::get('/workers-type/create',                             [App\Http\Controllers\Admin\UdhyogAluChipsController::class, 'workersTypeCreate'])->name('workerstype.create');
                Route::post('/workers-type/store',                             [App\Http\Controllers\Admin\UdhyogAluChipsController::class, 'workersTypeStore'])->name('workerstype.store');

                Route::get('/workers-position',                                    [App\Http\Controllers\Admin\UdhyogAluChipsController::class, 'workersPosition'])->name('workersposition.index');
                Route::get('/workers-position/create',                             [App\Http\Controllers\Admin\UdhyogAluChipsController::class, 'workersPositionCreate'])->name('workersposition.create');
                Route::post('/workers-position/store',                             [App\Http\Controllers\Admin\UdhyogAluChipsController::class, 'workersPositionStore'])->name('workersposition.store');

                Route::get('/workers-list',                                    [App\Http\Controllers\Admin\UdhyogAluChipsController::class, 'workersList'])->name('workerslist.index');
                Route::get('/workers-list/create',                             [App\Http\Controllers\Admin\UdhyogAluChipsController::class, 'workersListCreate'])->name('workerslist.create');
                Route::post('/workers-list/store',                             [App\Http\Controllers\Admin\UdhyogAluChipsController::class, 'workersListStore'])->name('workerslist.store');

                Route::get('/create',                                          [App\Http\Controllers\Admin\UdhyogAluChipsController::class, 'workers_create'])->name('create');

                Route::get('/edit/{id}',                                       [App\Http\Controllers\Admin\UdhyogAluChipsController::class, 'edit'])->name('edit');
                Route::get('/update/{id}',                                     [App\Http\Controllers\Admin\UdhyogAluChipsController::class, 'update'])->name('update');
                Route::get('/{id}',                                            [App\Http\Controllers\Admin\UdhyogAluChipsController::class, 'destroy'])->name('destroy');
            });

            Route::group(['prefix' => 'inventory', 'as' => 'inventory.'], function () {
                Route::group(['prefix' => 'suppliers', 'as' => 'suppliers.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\SupplierController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\SupplierController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\SupplierController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:supplier,id']], function () {
                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SupplierController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\SupplierController::class, 'update'])->name('update');
                        Route::delete('/{id}',                              [App\Http\Controllers\Admin\SupplierController::class, 'destroy'])->name('destroy');
                        Route::get('view/{id}',                             [App\Http\Controllers\Admin\SupplierController::class, 'view'])->name('view');
                    });
                });
                Route::group(['prefix' => 'supplier-payment', 'as' => 'supplier_paynet.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\SupplierController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\PaymentController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\SupplierController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SupplierController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\SupplierController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\SupplierController::class, 'destroy'])->name('destroy');
                });
                Route::group(['prefix' => 'raw-materials', 'as' => 'raw_materials.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\RawMaterialController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\RawMaterialController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\RawMaterialController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:rawmaterial,id']], function () {
                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\RawMaterialController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\RawMaterialController::class, 'update'])->name('update');
                        Route::delete('/{id}',                              [App\Http\Controllers\Admin\RawMaterialController::class, 'destroy'])->name('destroy');
                    });
                    Route::get('/inventory',                            [App\Http\Controllers\Admin\RawMaterialController::class, 'inventory'])->name('inventory');
                    Route::get('/low-stock',                            [App\Http\Controllers\Admin\RawMaterialController::class, 'lowStock'])->name('low_stock');
                });

                Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\InventoryProductController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\InventoryProductController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\InventoryProductController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:product,id']], function () {
                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\InventoryProductController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\InventoryProductController::class, 'update'])->name('update');
                        Route::delete('/{id}',                              [App\Http\Controllers\Admin\InventoryProductController::class, 'destroy'])->name('destroy');
                    });
                    Route::get('/low-stock',                         [App\Http\Controllers\Admin\InventoryProductController::class, 'lowStock'])->name('low_stock');
                    Route::get('/inventory',                            [App\Http\Controllers\Admin\InventoryProductController::class, 'inventory'])->name('inventory');

                });

                Route::group(['prefix' => 'production-batch', 'as' => 'production_batch.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\ProductionBatchController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\ProductionBatchController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\ProductionBatchController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:production_batch,id']], function () {
                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\ProductionBatchController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\ProductionBatchController::class, 'update'])->name('update');
                        Route::delete('/{id}',                              [App\Http\Controllers\Admin\ProductionBatchController::class, 'destroy'])->name('destroy');
                    });
                    Route::get('/stock-quantity',                       [App\Http\Controllers\Admin\ProductionBatchController::class, 'stockQuantity'])->name('stock_quantity');
                    Route::get('/view-report/{id}',                     [App\Http\Controllers\Admin\ProductionBatchController::class, 'view_report'])->name('view_report');
                    Route::get('/view-alert',                           [App\Http\Controllers\Admin\ProductionBatchController::class, 'getExpiringProducts'])->name('view_alert');

                });

                Route::group(['prefix' => 'damage-records', 'as' => 'damage_records.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\DamageRecordController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\DamageRecordController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\DamageRecordController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:damage_record,id']], function () {
                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\DamageRecordController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\DamageRecordController::class, 'update'])->name('update');
                        Route::delete('/{id}',                              [App\Http\Controllers\Admin\DamageRecordController::class, 'destroy'])->name('destroy');

                    });
                    Route::get('/stock-quantity',                       [App\Http\Controllers\Admin\DamageRecordController::class, 'stockQuantity'])->name('stock_quantity');
                    Route::get('/check-production-batch',               [App\Http\Controllers\Admin\DamageRecordController::class, 'checkProductionBatch'])->name('check_production_batch');

                });

                Route::group(['prefix' => 'damage-types', 'as' => 'damage_types.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\DamageTypeController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\DamageTypeController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\DamageTypeController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\DamageTypeController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\DamageTypeController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\DamageTypeController::class, 'destroy'])->name('destroy');
                });

                Route::group(['prefix' => 'raw-material-name', 'as' => 'raw_material_name.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\RawMaterialNameController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\RawMaterialNameController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\RawMaterialNameController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\RawMaterialNameController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\RawMaterialNameController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\RawMaterialNameController::class, 'destroy'])->name('destroy');
                    Route::get('/test',                                 [App\Http\Controllers\Admin\RawMaterialNameController::class, 'convertToNepali'])->name('convertToNepali');
                });

                Route::group(['prefix' => 'dealers', 'as' => 'dealers.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\DealerController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\DealerController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\DealerController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:rawmaterial_name,id']], function () {
                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\DealerController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\DealerController::class, 'update'])->name('update');
                        Route::delete('/{id}',                              [App\Http\Controllers\Admin\DealerController::class, 'destroy'])->name('destroy');
                    });
                    Route::get('/test',                                 [App\Http\Controllers\Admin\DealerController::class, 'convertToNepali'])->name('convertToNepali');
                    Route::get('/view/{id}',                            [App\Http\Controllers\Admin\DealerController::class, 'view'])->name('view');
                    Route::get('/orders/{id}',                            [App\Http\Controllers\Admin\DealerController::class, 'orders'])->name('orders');

                });

                Route::group(['prefix' => 'sales_orders', 'as' => 'sales_orders.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\SalesOrderController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\SalesOrderController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\SalesOrderController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:sales_order,id']], function () {

                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SalesOrderController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\SalesOrderController::class, 'update'])->name('update');
                        Route::delete('/{id}',                              [App\Http\Controllers\Admin\SalesOrderController::class, 'destroy'])->name('destroy');
                        Route::get('/view/{id}',                                 [App\Http\Controllers\Admin\SalesOrderController::class, 'view'])->name('view');
                    });
                });
            });
        });
    });
    Route::group(['middleware' => ['auth', 'checkUdhyogAccess:papad']], function () {
        Route::group(['prefix' => 'papad',  'as' => 'papad.'], function (){
            Route::group(['prefix' => 'fianance',  'as' => 'fianance.'], function (){
                Route::get('/index',                                    [App\Http\Controllers\Admin\UdhyogPapadController::class, 'fianance'])->name('index');
                Route::get('/create',                                   [App\Http\Controllers\Admin\UdhyogPapadController::class, 'fianance_create'])->name('create');
                Route::post('',                                         [App\Http\Controllers\Admin\UdhyogPapadController::class, 'store'])->name('store');
                Route::group(['middleware' => ['checkEntityAccess:fianance,id']], function () {

                    Route::get('/edit/{id}',                                [App\Http\Controllers\Admin\UdhyogPapadController::class, 'edit'])->name('edit');
                    Route::get('/update/{id}',                              [App\Http\Controllers\Admin\UdhyogPapadController::class, 'update'])->name('update');
                    Route::get('/{id}',                                     [App\Http\Controllers\Admin\UdhyogPapadController::class, 'destroy'])->name('destroy');
                    Route::get('/view-report/{id}',                         [App\Http\Controllers\Admin\VoucherController::class, 'viewReport'])->name('view_report');

                });
            });

            Route::group(['prefix' => 'workers',  'as' => 'workers.'], function (){
                Route::get('/workers-list',                                    [App\Http\Controllers\Admin\UdhyogPapadController::class, 'workersList'])->name('workersList');
                Route::get('/workers-type',                                    [App\Http\Controllers\Admin\UdhyogPapadController::class, 'workersType'])->name('workerstype.index');
                Route::get('/workers-type/create',                             [App\Http\Controllers\Admin\UdhyogPapadController::class, 'workersTypeCreate'])->name('workerstype.create');
                Route::post('/workers-type/store',                             [App\Http\Controllers\Admin\UdhyogPapadController::class, 'workersTypeStore'])->name('workerstype.store');

                Route::get('/workers-position',                                    [App\Http\Controllers\Admin\UdhyogPapadController::class, 'workersPosition'])->name('workersposition.index');
                Route::get('/workers-position/create',                             [App\Http\Controllers\Admin\UdhyogPapadController::class, 'workersPositionCreate'])->name('workersposition.create');
                Route::post('/workers-position/store',                             [App\Http\Controllers\Admin\UdhyogPapadController::class, 'workersPositionStore'])->name('workersposition.store');

                Route::get('/workers-list',                                    [App\Http\Controllers\Admin\UdhyogPapadController::class, 'workersList'])->name('workerslist.index');
                Route::get('/workers-list/create',                             [App\Http\Controllers\Admin\UdhyogPapadController::class, 'workersListCreate'])->name('workerslist.create');
                Route::post('/workers-list/store',                             [App\Http\Controllers\Admin\UdhyogPapadController::class, 'workersListStore'])->name('workerslist.store');

                Route::get('/create',                                          [App\Http\Controllers\Admin\UdhyogPapadController::class, 'workers_create'])->name('create');
                Route::get('/edit/{id}',                                       [App\Http\Controllers\Admin\UdhyogPapadController::class, 'edit'])->name('edit');
                Route::get('/update/{id}',                                     [App\Http\Controllers\Admin\UdhyogPapadController::class, 'update'])->name('update');
                Route::get('/{id}',                                            [App\Http\Controllers\Admin\UdhyogPapadController::class, 'destroy'])->name('destroy');
            });

            Route::group(['prefix' => 'inventory', 'as' => 'inventory.'], function () {
                Route::group(['prefix' => 'suppliers', 'as' => 'suppliers.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\SupplierController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\SupplierController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\SupplierController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:supplier,id']], function () {

                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SupplierController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\SupplierController::class, 'update'])->name('update');
                        Route::delete('/{id}',                           [App\Http\Controllers\Admin\SupplierController::class, 'destroy'])->name('destroy');
                        Route::get('view/{id}',                           [App\Http\Controllers\Admin\SupplierController::class, 'view'])->name('view');
                    });
                });
                Route::group(['prefix' => 'supplier-payment', 'as' => 'supplier_paynet.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\SupplierController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\PaymentController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\SupplierController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SupplierController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\SupplierController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\SupplierController::class, 'destroy'])->name('destroy');
                });
                Route::group(['prefix' => 'raw-materials', 'as' => 'raw_materials.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\RawMaterialController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\RawMaterialController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\RawMaterialController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:rawmaterial,id']], function () {
                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\RawMaterialController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\RawMaterialController::class, 'update'])->name('update');
                        Route::delete('/{id}',                              [App\Http\Controllers\Admin\RawMaterialController::class, 'destroy'])->name('destroy');
                    });
                    Route::get('/inventory',                            [App\Http\Controllers\Admin\RawMaterialController::class, 'inventory'])->name('inventory');
                    Route::get('/low-stock',                            [App\Http\Controllers\Admin\RawMaterialController::class, 'lowStock'])->name('low_stock');
                });

                Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\InventoryProductController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\InventoryProductController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\InventoryProductController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:product,id']], function () {

                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\InventoryProductController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\InventoryProductController::class, 'update'])->name('update');
                        Route::delete('/{id}',                              [App\Http\Controllers\Admin\InventoryProductController::class, 'destroy'])->name('destroy');
                    });
                    Route::get('/low-stock',                         [App\Http\Controllers\Admin\InventoryProductController::class, 'lowStock'])->name('low_stock');
                    Route::get('/inventory',                            [App\Http\Controllers\Admin\InventoryProductController::class, 'inventory'])->name('inventory');

                });

                Route::group(['prefix' => 'production-batch', 'as' => 'production_batch.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\ProductionBatchController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\ProductionBatchController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\ProductionBatchController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:production_batch,id']], function () {

                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\ProductionBatchController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\ProductionBatchController::class, 'update'])->name('update');
                        Route::delete('/{id}',                              [App\Http\Controllers\Admin\ProductionBatchController::class, 'destroy'])->name('destroy');
                        Route::get('/view-report/{id}',                     [App\Http\Controllers\Admin\ProductionBatchController::class, 'metrics'])->name('view_report');
                    });
                    Route::get('/view-alert',                           [App\Http\Controllers\Admin\ProductionBatchController::class, 'getExpiringProducts'])->name('view_alert');
                    Route::get('/stock-quantity',                       [App\Http\Controllers\Admin\ProductionBatchController::class, 'stockQuantity'])->name('stock_quantity');

                });

                Route::group(['prefix' => 'damage-records', 'as' => 'damage_records.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\DamageRecordController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\DamageRecordController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\DamageRecordController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:damage_record,id']], function () {

                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\DamageRecordController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\DamageRecordController::class, 'update'])->name('update');
                        Route::delete('/{id}',                              [App\Http\Controllers\Admin\DamageRecordController::class, 'destroy'])->name('destroy');
                    });
                    Route::get('/stock-quantity',                    [App\Http\Controllers\Admin\DamageRecordController::class, 'stockQuantity'])->name('stock_quantity');
                    Route::get('/check-production-batch',                    [App\Http\Controllers\Admin\DamageRecordController::class, 'checkProductionBatch'])->name('check_production_batch');

                });

                Route::group(['prefix' => 'damage-types', 'as' => 'damage_types.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\DamageTypeController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\DamageTypeController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\DamageTypeController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\DamageTypeController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\DamageTypeController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\DamageTypeController::class, 'destroy'])->name('destroy');
                });

                Route::group(['prefix' => 'raw-material-name', 'as' => 'raw_material_name.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\RawMaterialNameController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\RawMaterialNameController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\RawMaterialNameController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:rawmaterial_name,id']], function () {

                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\RawMaterialNameController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\RawMaterialNameController::class, 'update'])->name('update');
                        Route::delete('/{id}',                              [App\Http\Controllers\Admin\RawMaterialNameController::class, 'destroy'])->name('destroy');
                    });
                    Route::get('/test',                                 [App\Http\Controllers\Admin\RawMaterialNameController::class, 'convertToNepali'])->name('convertToNepali');
                });

                Route::group(['prefix' => 'dealers', 'as' => 'dealers.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\DealerController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\DealerController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\DealerController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:dealer,id']], function () {

                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\DealerController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\DealerController::class, 'update'])->name('update');
                        Route::delete('/{id}',                              [App\Http\Controllers\Admin\DealerController::class, 'destroy'])->name('destroy');
                        Route::get('/view/{id}',                            [App\Http\Controllers\Admin\DealerController::class, 'view'])->name('view');
                    });
                    Route::get('/orders/{id}',                            [App\Http\Controllers\Admin\DealerController::class, 'orders'])->name('orders');
                    Route::get('/test',                                 [App\Http\Controllers\Admin\DealerController::class, 'convertToNepali'])->name('convertToNepali');

                });

                Route::group(['prefix' => 'sales_orders', 'as' => 'sales_orders.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\SalesOrderController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\SalesOrderController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\SalesOrderController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:sales_order,id']], function () {

                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SalesOrderController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\SalesOrderController::class, 'update'])->name('update');
                        Route::delete('/{id}',                              [App\Http\Controllers\Admin\SalesOrderController::class, 'destroy'])->name('destroy');
                        Route::get('/view/{id}',                                 [App\Http\Controllers\Admin\SalesOrderController::class, 'view'])->name('view');
                    });
                });
            });
        });
    });
    Route::group(['middleware' => ['auth', 'checkUdhyogAccess:dudh']], function () {
        Route::group(['prefix' => 'dudh',  'as' => 'dudh.'], function (){
            Route::group(['prefix' => 'fianance',  'as' => 'fianance.'], function (){
                Route::get('/index',                                    [App\Http\Controllers\Admin\UdhyogDudhController::class, 'fianance'])->name('index');
                Route::get('/create',                                    [App\Http\Controllers\Admin\UdhyogDudhController::class, 'fianance_create'])->name('create');
                Route::post('',                                    [App\Http\Controllers\Admin\UdhyogDudhController::class, 'store'])->name('store');
                Route::group(['middleware' => ['checkEntityAccess:fianance,id']], function () {
                    Route::get('/edit/{id}',                                    [App\Http\Controllers\Admin\UdhyogDudhController::class, 'edit'])->name('edit');
                    Route::get('/update/{id}',                                    [App\Http\Controllers\Admin\UdhyogDudhController::class, 'update'])->name('update');
                    Route::get('/view-report/{id}',                                    [App\Http\Controllers\Admin\VoucherController::class, 'viewReport'])->name('view_report');
                    Route::get('/{id}',                                    [App\Http\Controllers\Admin\UdhyogDudhController::class, 'destroy'])->name('destroy');
                });
            });

            Route::group(['prefix' => 'workers',  'as' => 'workers.'], function (){
                Route::get('/workers-list',                                    [App\Http\Controllers\Admin\UdhyogDudhController::class, 'workersList'])->name('workersList');
                Route::get('/workers-type',                                    [App\Http\Controllers\Admin\UdhyogDudhController::class, 'workersType'])->name('workerstype.index');
                Route::get('/workers-type/create',                             [App\Http\Controllers\Admin\UdhyogDudhController::class, 'workersTypeCreate'])->name('workerstype.create');
                Route::post('/workers-type/store',                             [App\Http\Controllers\Admin\UdhyogDudhController::class, 'workersTypeStore'])->name('workerstype.store');

                Route::get('/workers-position',                                    [App\Http\Controllers\Admin\UdhyogDudhController::class, 'workersPosition'])->name('workersposition.index');
                Route::get('/workers-position/create',                             [App\Http\Controllers\Admin\UdhyogDudhController::class, 'workersPositionCreate'])->name('workersposition.create');
                Route::post('/workers-position/store',                             [App\Http\Controllers\Admin\UdhyogDudhController::class, 'workersPositionStore'])->name('workersposition.store');

                Route::get('/workers-list',                                    [App\Http\Controllers\Admin\UdhyogDudhController::class, 'workersList'])->name('workerslist.index');
                Route::get('/workers-list/create',                             [App\Http\Controllers\Admin\UdhyogDudhController::class, 'workersListCreate'])->name('workerslist.create');
                Route::post('/workers-list/store',                             [App\Http\Controllers\Admin\UdhyogDudhController::class, 'workersListStore'])->name('workerslist.store');

                Route::get('/create',                                          [App\Http\Controllers\Admin\UdhyogDudhController::class, 'workers_create'])->name('create');
                Route::get('/edit/{id}',                                       [App\Http\Controllers\Admin\UdhyogPUdhyogDudhControllerapadController::class, 'edit'])->name('edit');
                Route::get('/update/{id}',                                     [App\Http\Controllers\Admin\UdhyogDudhController::class, 'update'])->name('update');
                Route::get('/{id}',                                            [App\Http\Controllers\Admin\UdhyogDudhController::class, 'destroy'])->name('destroy');
            });

            Route::group(['prefix' => 'inventory', 'as' => 'inventory.'], function () {
                Route::group(['prefix' => 'suppliers', 'as' => 'suppliers.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\SupplierController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\SupplierController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\SupplierController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:supplier,id']], function () {

                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SupplierController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\SupplierController::class, 'update'])->name('update');
                        Route::delete('/{id}',                           [App\Http\Controllers\Admin\SupplierController::class, 'destroy'])->name('destroy');
                        Route::get('view/{id}',                           [App\Http\Controllers\Admin\SupplierController::class, 'view'])->name('view');
                    });
                });
                Route::group(['prefix' => 'supplier-payment', 'as' => 'supplier_paynet.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\SupplierController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\PaymentController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\SupplierController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SupplierController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\SupplierController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\SupplierController::class, 'destroy'])->name('destroy');
                });
                Route::group(['prefix' => 'raw-materials', 'as' => 'raw_materials.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\RawMaterialController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\RawMaterialController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\RawMaterialController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:rawmaterial,id']], function () {

                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\RawMaterialController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\RawMaterialController::class, 'update'])->name('update');
                        Route::delete('/{id}',                              [App\Http\Controllers\Admin\RawMaterialController::class, 'destroy'])->name('destroy');
                    });
                    Route::get('/inventory',                            [App\Http\Controllers\Admin\RawMaterialController::class, 'inventory'])->name('inventory');
                    Route::get('/low-stock',                            [App\Http\Controllers\Admin\RawMaterialController::class, 'lowStock'])->name('low_stock');
                });

                Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\InventoryProductController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\InventoryProductController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\InventoryProductController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:product,id']], function () {

                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\InventoryProductController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\InventoryProductController::class, 'update'])->name('update');
                        Route::delete('/{id}',                              [App\Http\Controllers\Admin\InventoryProductController::class, 'destroy'])->name('destroy');
                    });
                    Route::get('/low-stock',                         [App\Http\Controllers\Admin\InventoryProductController::class, 'lowStock'])->name('low_stock');
                    Route::get('/inventory',                            [App\Http\Controllers\Admin\InventoryProductController::class, 'inventory'])->name('inventory');

                });

                Route::group(['prefix' => 'production-batch', 'as' => 'production_batch.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\ProductionBatchController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\ProductionBatchController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\ProductionBatchController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:production_batch,id']], function () {

                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\ProductionBatchController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\ProductionBatchController::class, 'update'])->name('update');
                        Route::delete('/{id}',                              [App\Http\Controllers\Admin\ProductionBatchController::class, 'destroy'])->name('destroy');
                        Route::get('/view-report/{id}',                     [App\Http\Controllers\Admin\ProductionBatchController::class, 'metrics'])->name('view_report');
                    });
                    Route::get('/stock-quantity',                       [App\Http\Controllers\Admin\ProductionBatchController::class, 'stockQuantity'])->name('stock_quantity');
                    Route::get('/view-alert',                           [App\Http\Controllers\Admin\ProductionBatchController::class, 'getExpiringProducts'])->name('view_alert');

                });

                Route::group(['prefix' => 'damage-records', 'as' => 'damage_records.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\DamageRecordController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\DamageRecordController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\DamageRecordController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:damage_record,id']], function () {

                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\DamageRecordController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\DamageRecordController::class, 'update'])->name('update');
                        Route::delete('/{id}',                              [App\Http\Controllers\Admin\DamageRecordController::class, 'destroy'])->name('destroy');
                    });
                    Route::get('/stock-quantity',                    [App\Http\Controllers\Admin\DamageRecordController::class, 'stockQuantity'])->name('stock_quantity');
                    Route::get('/check-production-batch',                    [App\Http\Controllers\Admin\DamageRecordController::class, 'checkProductionBatch'])->name('check_production_batch');

                });

                Route::group(['prefix' => 'damage-types', 'as' => 'damage_types.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\DamageTypeController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\DamageTypeController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\DamageTypeController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\DamageTypeController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\DamageTypeController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\DamageTypeController::class, 'destroy'])->name('destroy');
                });

                Route::group(['prefix' => 'raw-material-name', 'as' => 'raw_material_name.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\RawMaterialNameController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\RawMaterialNameController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\RawMaterialNameController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:rawmaterial_name,id']], function () {

                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\RawMaterialNameController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\RawMaterialNameController::class, 'update'])->name('update');
                        Route::delete('/{id}',                              [App\Http\Controllers\Admin\RawMaterialNameController::class, 'destroy'])->name('destroy');
                    });
                    Route::get('/test',                                 [App\Http\Controllers\Admin\RawMaterialNameController::class, 'convertToNepali'])->name('convertToNepali');
                });

                Route::group(['prefix' => 'dealers', 'as' => 'dealers.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\DealerController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\DealerController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\DealerController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:dealer,id']], function () {

                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\DealerController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\DealerController::class, 'update'])->name('update');
                        Route::delete('/{id}',                              [App\Http\Controllers\Admin\DealerController::class, 'destroy'])->name('destroy');
                        Route::get('/view/{id}',                            [App\Http\Controllers\Admin\DealerController::class, 'view'])->name('view');
                    });
                    Route::get('/test',                                 [App\Http\Controllers\Admin\DealerController::class, 'convertToNepali'])->name('convertToNepali');
                    Route::get('/orders/{id}',                            [App\Http\Controllers\Admin\DealerController::class, 'orders'])->name('orders');

                });

                Route::group(['prefix' => 'sales_orders', 'as' => 'sales_orders.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\SalesOrderController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\SalesOrderController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\SalesOrderController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:sales_order,id']], function () {

                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SalesOrderController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\SalesOrderController::class, 'update'])->name('update');
                        Route::delete('/{id}',                              [App\Http\Controllers\Admin\SalesOrderController::class, 'destroy'])->name('destroy');
                        Route::get('/view/{id}',                                 [App\Http\Controllers\Admin\SalesOrderController::class, 'view'])->name('view');
                    });
                });
            });
        });
    });

    Route::group(['middleware' => ['auth', 'checkUdhyogAccess:hybrid biu']], function () {
        Route::group(['prefix' => 'hybridbiu',  'as' => 'hybridbiu.'], function (){
            Route::group(['prefix' => 'fianance',  'as' => 'fianance.'], function (){
                Route::get('/index',                                    [App\Http\Controllers\Admin\UdhyogHybridBiuController::class, 'fianance'])->name('index');
                Route::get('/create',                                   [App\Http\Controllers\Admin\UdhyogHybridBiuController::class, 'fianance_create'])->name('create');
                Route::post('',                                         [App\Http\Controllers\Admin\UdhyogHybridBiuController::class, 'store'])->name('store');
                Route::group(['middleware' => ['checkEntityAccess:fianance,id']], function () {

                    Route::get('/edit/{id}',                                [App\Http\Controllers\Admin\UdhyogHybridBiuController::class, 'edit'])->name('edit');
                    Route::get('/update/{id}',                              [App\Http\Controllers\Admin\UdhyogHybridBiuController::class, 'update'])->name('update');
                    Route::get('/{id}',                                     [App\Http\Controllers\Admin\UdhyogHybridBiuController::class, 'destroy'])->name('destroy');
                    Route::get('view/{id}',                           [App\Http\Controllers\Admin\SupplierController::class, 'view'])->name('view');
                    Route::get('/view-report/{id}',                         [App\Http\Controllers\Admin\VoucherController::class, 'viewReport'])->name('view_report');
                });
            });

            Route::group(['prefix' => 'workers',  'as' => 'workers.'], function (){
                Route::get('/workers-list',                                    [App\Http\Controllers\Admin\UdhyogHybridBiuController::class, 'workersList'])->name('workersList');
                Route::get('/workers-type',                                    [App\Http\Controllers\Admin\UdhyogHybridBiuController::class, 'workersType'])->name('workerstype.index');
                Route::get('/workers-type/create',                             [App\Http\Controllers\Admin\UdhyogHybridBiuController::class, 'workersTypeCreate'])->name('workerstype.create');
                Route::post('/workers-type/store',                             [App\Http\Controllers\Admin\UdhyogHybridBiuController::class, 'workersTypeStore'])->name('workerstype.store');

                Route::get('/workers-position',                                    [App\Http\Controllers\Admin\UdhyogHybridBiuController::class, 'workersPosition'])->name('workersposition.index');
                Route::get('/workers-position/create',                             [App\Http\Controllers\Admin\UdhyogHybridBiuController::class, 'workersPositionCreate'])->name('workersposition.create');
                Route::post('/workers-position/store',                             [App\Http\Controllers\Admin\UdhyogHybridBiuController::class, 'workersPositionStore'])->name('workersposition.store');

                Route::get('/workers-list',                                    [App\Http\Controllers\Admin\UdhyogHybridBiuController::class, 'workersList'])->name('workerslist.index');
                Route::get('/workers-list/create',                             [App\Http\Controllers\Admin\UdhyogHybridBiuController::class, 'workersListCreate'])->name('workerslist.create');
                Route::post('/workers-list/store',                             [App\Http\Controllers\Admin\UdhyogHybridBiuController::class, 'workersListStore'])->name('workerslist.store');

                Route::get('/create',                                          [App\Http\Controllers\Admin\UdhyogHybridBiuController::class, 'workers_create'])->name('create');
                Route::get('/edit/{id}',                                       [App\Http\Controllers\Admin\UdhyogHybridBiuController::class, 'edit'])->name('edit');
                Route::get('/update/{id}',                                     [App\Http\Controllers\Admin\UdhyogHybridBiuController::class, 'update'])->name('update');
                Route::get('/{id}',                                            [App\Http\Controllers\Admin\UdhyogHybridBiuController::class, 'destroy'])->name('destroy');
            });

            Route::group(['prefix' => 'inventory', 'as' => 'inventory.'], function () {
                Route::group(['prefix' => 'suppliers', 'as' => 'suppliers.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\SupplierController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\SupplierController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\SupplierController::class, 'store'])->name('store');
                    Route::group(['middleware' => ['checkEntityAccess:supplier,id']], function () {

                        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SupplierController::class, 'edit'])->name('edit');
                        Route::post('update/{id}',                          [App\Http\Controllers\Admin\SupplierController::class, 'update'])->name('update');
                        Route::delete('/{id}',                           [App\Http\Controllers\Admin\SupplierController::class, 'destroy'])->name('destroy');
                        Route::get('view/{id}',                             [App\Http\Controllers\Admin\SupplierController::class, 'view'])->name('view');
                    });
                });

                Route::group(['prefix' => 'supplier-payment', 'as' => 'supplier_paynet.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\SupplierController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\PaymentController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\SupplierController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SupplierController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\SupplierController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\SupplierController::class, 'destroy'])->name('destroy');
                });

                Route::group(['prefix' => 'seed-types', 'as' => 'seed_types.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\SeedTypeController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\SeedTypeController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\SeedTypeController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SeedTypeController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\SeedTypeController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\SeedTypeController::class, 'destroy'])->name('destroy');
                    Route::get('/inventory',                            [App\Http\Controllers\Admin\SeedTypeController::class, 'inventory'])->name('inventory');
                    Route::get('/low-stock',                            [App\Http\Controllers\Admin\SeedTypeController::class, 'lowStock'])->name('low_stock');
                });
                Route::group(['prefix' => 'seeds', 'as' => 'seeds.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\SeedController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\SeedController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\SeedController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SeedController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\SeedController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\SeedController::class, 'destroy'])->name('destroy');
                    Route::get('/inventory',                            [App\Http\Controllers\Admin\SeedController::class, 'inventory'])->name('inventory');
                    Route::get('/low-stock',                            [App\Http\Controllers\Admin\SeedController::class, 'lowStock'])->name('low_stock');
                });
                Route::group(['prefix' => 'raw-materials', 'as' => 'raw_materials.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\RawMaterialController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\RawMaterialController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\RawMaterialController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\RawMaterialController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\RawMaterialController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\RawMaterialController::class, 'destroy'])->name('destroy');
                    Route::get('/inventory',                            [App\Http\Controllers\Admin\RawMaterialController::class, 'inventory'])->name('inventory');
                    Route::get('/low-stock',                            [App\Http\Controllers\Admin\RawMaterialController::class, 'lowStock'])->name('low_stock');
                });
                Route::group(['prefix' => 'seed-order', 'as' => 'seed_order.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\SeedSupplyController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\SeedSupplyController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\SeedSupplyController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SeedSupplyController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\SeedSupplyController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\SeedSupplyController::class, 'destroy'])->name('destroy');
                    Route::get('/inventory',                            [App\Http\Controllers\Admin\SeedSupplyController::class, 'inventory'])->name('inventory');
                    Route::get('/low-stock',                            [App\Http\Controllers\Admin\SeedSupplyController::class, 'lowStock'])->name('low_stock');
                });
                Route::group(['prefix' => 'seasons', 'as' => 'seasons.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\SeasonController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\SeasonController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\SeasonController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SeasonController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\SeasonController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\SeasonController::class, 'destroy'])->name('destroy');
                    Route::get('/inventory',                            [App\Http\Controllers\Admin\SeasonController::class, 'inventory'])->name('inventory');
                    Route::get('/low-stock',                            [App\Http\Controllers\Admin\SeasonController::class, 'lowStock'])->name('low_stock');
                });
                Route::group(['prefix' => 'seed-batch', 'as' => 'seed_batch.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\SeedBatchController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\SeedBatchController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\SeedBatchController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SeedBatchController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\SeedBatchController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\SeedBatchController::class, 'destroy'])->name('destroy');
                    Route::post('/applicantid',                         [App\Http\Controllers\Admin\FarmController::class, 'applicantid'])->name('applicantid');
                    Route::get('/check_production_batch',               [App\Http\Controllers\Admin\SeedBatchController::class, 'check_production_batch'])->name('check_production_batch');
                    Route::get('/inventory',                            [App\Http\Controllers\Admin\SeedBatchController::class, 'inventory'])->name('inventory');

                    Route::get('/view/{id}',                             [App\Http\Controllers\Admin\SeedBatchController::class, 'view'])->name('view');
                    Route::post('/add_seed',                             [App\Http\Controllers\Admin\SeedBatchController::class, 'add_seed'])->name('add_seed');
                    Route::post('/add_mal',                              [App\Http\Controllers\Admin\SeedBatchController::class, 'add_mal'])->name('add_mal');
                    Route::post('/add_worker',                           [App\Http\Controllers\Admin\SeedBatchController::class, 'add_worker'])->name('add_worker');
                    Route::post('/add_machinery',                        [App\Http\Controllers\Admin\SeedBatchController::class, 'add_machinery'])->name('add_machinery');
                    Route::post('/add_other_material',                   [App\Http\Controllers\Admin\SeedBatchController::class, 'add_other_material'])->name('add_other_material');
                });

                Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\InventoryProductController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\InventoryProductController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\InventoryProductController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\InventoryProductController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\InventoryProductController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\InventoryProductController::class, 'destroy'])->name('destroy');
                    Route::get('/low-stock',                            [App\Http\Controllers\Admin\InventoryProductController::class, 'lowStock'])->name('low_stock');
                    Route::get('/inventory',                            [App\Http\Controllers\Admin\InventoryProductController::class, 'inventory'])->name('inventory');
                });

                Route::group(['prefix' => 'production-batch', 'as' => 'production_batch.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\ProductionBatchController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\ProductionBatchController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\ProductionBatchController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\ProductionBatchController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\ProductionBatchController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\ProductionBatchController::class, 'destroy'])->name('destroy');
                    Route::get('/stock-quantity',                       [App\Http\Controllers\Admin\ProductionBatchController::class, 'stockQuantity'])->name('stock_quantity');
                    Route::get('/view-report/{id}',                     [App\Http\Controllers\Admin\ProductionBatchController::class, 'metrics'])->name('view_report');
                    Route::get('/view-alert',                           [App\Http\Controllers\Admin\ProductionBatchController::class, 'getExpiringProducts'])->name('view_alert');

                });

                Route::group(['prefix' => 'damage-records', 'as' => 'damage_records.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\DamageRecordController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\DamageRecordController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\DamageRecordController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\DamageRecordController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\DamageRecordController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\DamageRecordController::class, 'destroy'])->name('destroy');
                    Route::get('/stock-quantity',                    [App\Http\Controllers\Admin\DamageRecordController::class, 'stockQuantity'])->name('stock_quantity');
                    Route::get('/check-production-batch',                    [App\Http\Controllers\Admin\DamageRecordController::class, 'checkProductionBatch'])->name('check_production_batch');

                });

                Route::group(['prefix' => 'damage-types', 'as' => 'damage_types.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\DamageTypeController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\DamageTypeController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\DamageTypeController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\DamageTypeController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\DamageTypeController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\DamageTypeController::class, 'destroy'])->name('destroy');
                });

                Route::group(['prefix' => 'raw-material-name', 'as' => 'raw_material_name.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\RawMaterialNameController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\RawMaterialNameController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\RawMaterialNameController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\RawMaterialNameController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\RawMaterialNameController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\RawMaterialNameController::class, 'destroy'])->name('destroy');
                    Route::get('/test',                                 [App\Http\Controllers\Admin\RawMaterialNameController::class, 'convertToNepali'])->name('convertToNepali');
                });

                Route::group(['prefix' => 'dealers', 'as' => 'dealers.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\DealerController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\DealerController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\DealerController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\DealerController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\DealerController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\DealerController::class, 'destroy'])->name('destroy');
                    Route::get('/test',                                 [App\Http\Controllers\Admin\DealerController::class, 'convertToNepali'])->name('convertToNepali');
                    Route::get('/view/{id}',                            [App\Http\Controllers\Admin\DealerController::class, 'view'])->name('view');
                    Route::get('/orders/{id}',                          [App\Http\Controllers\Admin\DealerController::class, 'orders'])->name('orders');

                });

                Route::group(['prefix' => 'sales_orders', 'as' => 'sales_orders.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\SalesOrderController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\SalesOrderController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\SalesOrderController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SalesOrderController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\SalesOrderController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\SalesOrderController::class, 'destroy'])->name('destroy');
                    Route::get('/view/{id}',                                 [App\Http\Controllers\Admin\SalesOrderController::class, 'view'])->name('view');
                });
                Route::group(['prefix' => 'khadhyanna', 'as' => 'khadhyanna.'], function () {
                    Route::get('/',                                     [App\Http\Controllers\Admin\KhadhyannaController::class, 'index'])->name('index');
                    Route::get('/create',                               [App\Http\Controllers\Admin\KhadhyannaController::class, 'create'])->name('create');
                    Route::post('',                                     [App\Http\Controllers\Admin\KhadhyannaController::class, 'store'])->name('store');
                    Route::get('edit/{id}',                             [App\Http\Controllers\Admin\KhadhyannaController::class, 'edit'])->name('edit');
                    Route::post('update/{id}',                          [App\Http\Controllers\Admin\KhadhyannaController::class, 'update'])->name('update');
                    Route::delete('/{id}',                              [App\Http\Controllers\Admin\KhadhyannaController::class, 'destroy'])->name('destroy');
                    Route::get('/view/{id}',                            [App\Http\Controllers\Admin\KhadhyannaController::class, 'view'])->name('view');
                });
            });
        });
    });

});
/**
 * Inventory
 *  Product ROUTE  ////
 */
Route::group(['prefix' => 'product',  'as' => 'product.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('destroy');
    Route::get('/low-stock',                           [App\Http\Controllers\Admin\ProductController::class, 'lowStock'])->name('low_stock');
});
/**
 * Inventory
 *  Billing Route  ////
 */
Route::group(['prefix' => 'billing',                   'as' => 'billing.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\BillingController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\BillingController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\BillingController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\BillingController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\BillingController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\BillingController::class, 'destroy'])->name('destroy');
    Route::get('/view/{id}',                           [App\Http\Controllers\Admin\BillingController::class, 'view'])->name('view');
    Route::get('/pdf/{id}',                            [App\Http\Controllers\Admin\BillingController::class, 'downloadPDF'])->name('downloadPDF');
});

Route::group(['prefix' => 'voucher_category',           'as' => 'voucher_category.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\VoucherCategoryController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\VoucherCategoryController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\VoucherCategoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\VoucherCategoryController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\VoucherCategoryController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\VoucherCategoryController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'transactions',           'as' => 'transactions.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('index');
    Route::get('/create',                              [App\Http\Controllers\Admin\TransactionController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\TransactionController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\TransactionController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\TransactionController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\TransactionController::class, 'destroy'])->name('destroy');
    Route::get('/view-payment/{transaction_key}',      [App\Http\Controllers\Admin\TransactionController::class, 'view_payment'])->name('view_payment');
    Route::get('/view-details/{transaction_key}',      [App\Http\Controllers\Admin\TransactionController::class, 'view_details'])->name('view_details');
    Route::get('/sales-order-detail/{transaction_key}',[App\Http\Controllers\Admin\TransactionController::class, 'sales_order_detail'])->name('sales_order_detail');
});
Route::group(['prefix' => 'payment',           'as' => 'payment.'], function () {
    Route::get('/',                                    [App\Http\Controllers\Admin\PaymentController::class, 'index'])->name('index');
    Route::get('/create/{transaction_key}',                              [App\Http\Controllers\Admin\PaymentController::class, 'create'])->name('create');
    Route::post('',                                    [App\Http\Controllers\Admin\PaymentController::class, 'store'])->name('store');
    Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\PaymentController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',                        [App\Http\Controllers\Admin\PaymentController::class, 'update'])->name('update');
    Route::delete('/{id}',                             [App\Http\Controllers\Admin\PaymentController::class, 'destroy'])->name('destroy');
    Route::get('view-payment/{transaction_key}',                    [App\Http\Controllers\Admin\PaymentController::class, 'view_payment'])->name('view_payment');
});



Route::group(['prefix' => 'lekha_sirsak', 'as' => 'lekha_sirsak.'], function () {
    Route::get('/',                                     [App\Http\Controllers\Admin\LekhaSirsakController::class, 'index'])->name('index');
    Route::get('/create',                               [App\Http\Controllers\Admin\LekhaSirsakController::class, 'create'])->name('create');
    Route::delete('/{id}',                              [App\Http\Controllers\Admin\LekhaSirsakController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'voucher', 'as' => 'voucher.'], function () {
    Route::get('/',                                     [App\Http\Controllers\Admin\VoucherController::class, 'index'])->name('index');
    Route::get('/create',                               [App\Http\Controllers\Admin\VoucherController::class, 'create'])->name('create');
    Route::post('',                                     [App\Http\Controllers\Admin\VoucherController::class, 'store'])->name('store');
    Route::get('view_report/{id}',                      [App\Http\Controllers\Admin\VoucherController::class, 'viewReport'])->name('view_report');
    Route::delete('/{id}',                              [App\Http\Controllers\Admin\VoucherController::class, 'destroy'])->name('destroy');

});

Route::group(['prefix' => 'industries', 'as' => 'industries.'], function () {
    Route::get('/achar',                                     [App\Http\Controllers\Admin\VoucherController::class, 'index'])->name('index');
    Route::get('/create',                               [App\Http\Controllers\Admin\VoucherController::class, 'create'])->name('create');
    Route::post('',                                     [App\Http\Controllers\Admin\VoucherController::class, 'store'])->name('store');
});

// inventoriy Route
Route::group(['prefix' => 'inventory', 'as' => 'inventory.'], function () {
    Route::group(['prefix' => 'suppliers', 'as' => 'suppliers.'], function () {
        Route::get('/',                                     [App\Http\Controllers\Admin\SupplierController::class, 'index'])->name('index');
        Route::get('/create',                               [App\Http\Controllers\Admin\SupplierController::class, 'create'])->name('create');
        Route::post('',                                     [App\Http\Controllers\Admin\SupplierController::class, 'store'])->name('store');
        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SupplierController::class, 'edit'])->name('edit');
        Route::post('update/{id}',                          [App\Http\Controllers\Admin\SupplierController::class, 'update'])->name('update');
        Route::delete('/{id}',                              [App\Http\Controllers\Admin\SupplierController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => 'seeds', 'as' => 'seeds.'], function () {
        Route::get('/',                                     [App\Http\Controllers\Admin\SeedController::class, 'index'])->name('index');
        Route::get('/create',                               [App\Http\Controllers\Admin\SeedController::class, 'create'])->name('create');
        Route::post('',                                     [App\Http\Controllers\Admin\SeedController::class, 'store'])->name('store');
        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SeedController::class, 'edit'])->name('edit');
        Route::post('update/{id}',                          [App\Http\Controllers\Admin\SeedController::class, 'update'])->name('update');
        Route::delete('/{id}',                              [App\Http\Controllers\Admin\SeedController::class, 'destroy'])->name('destroy');
        Route::get('/view/{id}',                                 [App\Http\Controllers\Admin\SeedController::class, 'view'])->name('view');
    });

    Route::group(['prefix' => 'seed-batch', 'as' => 'seed_batch.'], function () {
        Route::get('/',                                     [App\Http\Controllers\Admin\SeedBatchController::class, 'index'])->name('index');
        Route::get('/create',                               [App\Http\Controllers\Admin\SeedBatchController::class, 'create'])->name('create');
        Route::post('',                                     [App\Http\Controllers\Admin\SeedBatchController::class, 'store'])->name('store');
        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SeedBatchController::class, 'edit'])->name('edit');
        Route::post('update/{id}',                          [App\Http\Controllers\Admin\SeedBatchController::class, 'update'])->name('update');
        Route::delete('/{id}',                              [App\Http\Controllers\Admin\SeedBatchController::class, 'destroy'])->name('destroy');
        Route::post('/applicantid',                         [App\Http\Controllers\Admin\FarmController::class, 'applicantid'])->name('applicantid');
        Route::get('/view/{id}',                            [App\Http\Controllers\Admin\SeedBatchController::class, 'view'])->name('view');
        Route::get('/check-stock-quantity',                 [App\Http\Controllers\Admin\SeedBatchController::class, 'check_stock_quantity'])->name('check_stock_quantity');
    });

    Route::group(['prefix' => 'seasons', 'as' => 'seasons.'], function () {
        Route::get('/',                                     [App\Http\Controllers\Admin\SeasonController::class, 'index'])->name('index');
        Route::get('/create',                               [App\Http\Controllers\Admin\SeasonController::class, 'create'])->name('create');
        Route::post('',                                     [App\Http\Controllers\Admin\SeasonController::class, 'store'])->name('store');
        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SeasonController::class, 'edit'])->name('edit');
        Route::post('update/{id}',                          [App\Http\Controllers\Admin\SeasonController::class, 'update'])->name('update');
        Route::delete('/{id}',                              [App\Http\Controllers\Admin\SeasonController::class, 'destroy'])->name('destroy');
        Route::get('/view/{id}',                            [App\Http\Controllers\Admin\SeasonController::class, 'view'])->name('view');
    });
    Route::group(['prefix' => 'seed-types', 'as' => 'seed_types.'], function () {
        Route::get('/',                                     [App\Http\Controllers\Admin\SeedTypeController::class, 'index'])->name('index');
        Route::get('/create',                               [App\Http\Controllers\Admin\SeedTypeController::class, 'create'])->name('create');
        Route::post('',                                     [App\Http\Controllers\Admin\SeedTypeController::class, 'store'])->name('store');
        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SeedTypeController::class, 'edit'])->name('edit');
        Route::post('update/{id}',                          [App\Http\Controllers\Admin\SeedTypeController::class, 'update'])->name('update');
        Route::delete('/{id}',                              [App\Http\Controllers\Admin\SeedTypeController::class, 'destroy'])->name('destroy');
        Route::get('/view/{id}',                                 [App\Http\Controllers\Admin\SeedTypeController::class, 'view'])->name('view');
    });
    Route::group(['prefix' => 'raw-materials', 'as' => 'raw_materials.'], function () {
        Route::get('/',                                     [App\Http\Controllers\Admin\RawMaterialController::class, 'index'])->name('index');
        Route::get('/create',                               [App\Http\Controllers\Admin\RawMaterialController::class, 'create'])->name('create');
        Route::post('',                                     [App\Http\Controllers\Admin\RawMaterialController::class, 'store'])->name('store');
        Route::post('',                                     [App\Http\Controllers\Admin\RawMaterialController::class, 'add_raw_material'])->name('add_raw_material');
        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\RawMaterialController::class, 'edit'])->name('edit');
        Route::post('update/{id}',                          [App\Http\Controllers\Admin\RawMaterialController::class, 'update'])->name('update');
        Route::delete('/{id}',                              [App\Http\Controllers\Admin\RawMaterialController::class, 'destroy'])->name('destroy');
        Route::get('/inventory',                            [App\Http\Controllers\Admin\RawMaterialController::class, 'inventory'])->name('inventory');
        Route::get('/low-stock',                            [App\Http\Controllers\Admin\RawMaterialController::class, 'lowStock'])->name('low_stock');
    });

    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/',                                     [App\Http\Controllers\Admin\InventoryProductController::class, 'index'])->name('index');
        Route::get('/create',                               [App\Http\Controllers\Admin\InventoryProductController::class, 'create'])->name('create');
        Route::post('',                                     [App\Http\Controllers\Admin\InventoryProductController::class, 'store'])->name('store');
        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\InventoryProductController::class, 'edit'])->name('edit');
        Route::post('update/{id}',                          [App\Http\Controllers\Admin\InventoryProductController::class, 'update'])->name('update');
        Route::delete('/{id}',                              [App\Http\Controllers\Admin\InventoryProductController::class, 'destroy'])->name('destroy');
        Route::get('/low-stock',                            [App\Http\Controllers\Admin\InventoryProductController::class, 'lowStock'])->name('low_stock');
        Route::get('/inventory',                            [App\Http\Controllers\Admin\InventoryProductController::class, 'inventory'])->name('inventory');
        Route::get('/get-expiry-alert',                     [App\Http\Controllers\Admin\InventoryProductController::class, 'getExpiryAlertData'])->name("alert_product");

    });

    Route::group(['prefix' => 'production-batch', 'as' => 'production_batch.'], function () {
        Route::get('/',                                     [App\Http\Controllers\Admin\ProductionBatchController::class, 'index'])->name('index');
        Route::get('/create',                               [App\Http\Controllers\Admin\ProductionBatchController::class, 'create'])->name('create');
        Route::post('',                                     [App\Http\Controllers\Admin\ProductionBatchController::class, 'store'])->name('store');
        Route::post('add-raw-material',                     [App\Http\Controllers\Admin\ProductionBatchController::class, 'add_raw_material'])->name('add_raw_material');
        Route::post('add-worker',                           [App\Http\Controllers\Admin\ProductionBatchController::class, 'add_worker'])->name('add_worker');
        Route::post('add-other-material',                           [App\Http\Controllers\Admin\ProductionBatchController::class, 'add_other_material'])->name('add_other_material');
        Route::post('add-damage-record',                           [App\Http\Controllers\Admin\ProductionBatchController::class, 'add_damage_record'])->name('add_damage_record');
        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\ProductionBatchController::class, 'edit'])->name('edit');
        Route::post('update/{id}',                          [App\Http\Controllers\Admin\ProductionBatchController::class, 'update'])->name('update');
        Route::delete('/{id}',                              [App\Http\Controllers\Admin\ProductionBatchController::class, 'destroy'])->name('destroy');
        Route::delete('delete-worker/{id}',                 [App\Http\Controllers\Admin\ProductionBatchController::class, 'delete_worker'])->name('delete_worker');
        Route::delete('delete-raw-material/{id}',           [App\Http\Controllers\Admin\ProductionBatchController::class, 'delete_raw_material'])->name('delete_raw_material');
        Route::delete('delete-other-material/{id}',         [App\Http\Controllers\Admin\ProductionBatchController::class, 'delete_other_material'])->name('delete_other_material');
        Route::delete('delete-damage-record/{id}',         [App\Http\Controllers\Admin\ProductionBatchController::class, 'delete_damage_record'])->name('delete_damage_record');

        Route::get('/stock-quantity',                       [App\Http\Controllers\Admin\ProductionBatchController::class, 'stockQuantity'])->name('stock_quantity');
        Route::get('/check_stock_quantity',                 [App\Http\Controllers\Admin\ProductionBatchController::class, 'check_stock_quantity'])->name('check_stock_quantity');
        Route::get('/view-report/{id}',                     [App\Http\Controllers\Admin\ProductionBatchController::class, 'metrics'])->name('view_report');
        Route::get('/view-alert',                           [App\Http\Controllers\Admin\ProductionBatchController::class, 'getExpiringProducts'])->name('view_alert');
        Route::get('/get-expiry-alert',                     [App\Http\Controllers\Admin\ProductionBatchController::class, 'getExpiryAlertData'])->name("alert_product");

    });

    Route::group(['prefix' => 'damage-records', 'as' => 'damage_records.'], function () {
        Route::get('/',                                     [App\Http\Controllers\Admin\DamageRecordController::class, 'index'])->name('index');
        Route::get('/create',                               [App\Http\Controllers\Admin\DamageRecordController::class, 'create'])->name('create');
        Route::post('',                                     [App\Http\Controllers\Admin\DamageRecordController::class, 'store'])->name('store');
        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\DamageRecordController::class, 'edit'])->name('edit');
        Route::post('update/{id}',                          [App\Http\Controllers\Admin\DamageRecordController::class, 'update'])->name('update');
        Route::delete('/{id}',                              [App\Http\Controllers\Admin\DamageRecordController::class, 'destroy'])->name('destroy');
        Route::get('/stock-quantity',                    [App\Http\Controllers\Admin\DamageRecordController::class, 'stockQuantity'])->name('stock_quantity');
        Route::get('/check-production-batch',                    [App\Http\Controllers\Admin\DamageRecordController::class, 'checkProductionBatch'])->name('check_production_batch');

    });

    Route::group(['prefix' => 'damage-types', 'as' => 'damage_types.'], function () {
        Route::get('/',                                     [App\Http\Controllers\Admin\DamageTypeController::class, 'index'])->name('index');
        Route::get('/create',                               [App\Http\Controllers\Admin\DamageTypeController::class, 'create'])->name('create');
        Route::post('',                                     [App\Http\Controllers\Admin\DamageTypeController::class, 'store'])->name('store');
        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\DamageTypeController::class, 'edit'])->name('edit');
        Route::post('update/{id}',                          [App\Http\Controllers\Admin\DamageTypeController::class, 'update'])->name('update');
        Route::delete('/{id}',                              [App\Http\Controllers\Admin\DamageTypeController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'raw-material-name', 'as' => 'raw_material_name.'], function () {
        Route::get('/',                                     [App\Http\Controllers\Admin\RawMaterialNameController::class, 'index'])->name('index');
        Route::get('/create',                               [App\Http\Controllers\Admin\RawMaterialNameController::class, 'create'])->name('create');
        Route::post('',                                     [App\Http\Controllers\Admin\RawMaterialNameController::class, 'store'])->name('store');
        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\RawMaterialNameController::class, 'edit'])->name('edit');
        Route::post('update/{id}',                          [App\Http\Controllers\Admin\RawMaterialNameController::class, 'update'])->name('update');
        Route::delete('/{id}',                              [App\Http\Controllers\Admin\RawMaterialNameController::class, 'destroy'])->name('destroy');
        Route::get('/test',                                 [App\Http\Controllers\Admin\RawMaterialNameController::class, 'convertToNepali'])->name('convertToNepali');
    });

    Route::group(['prefix' => 'dealers', 'as' => 'dealers.'], function () {
        Route::get('/',                                     [App\Http\Controllers\Admin\DealerController::class, 'index'])->name('index');
        Route::get('/create',                               [App\Http\Controllers\Admin\DealerController::class, 'create'])->name('create');
        Route::post('',                                     [App\Http\Controllers\Admin\DealerController::class, 'store'])->name('store');
        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\DealerController::class, 'edit'])->name('edit');
        Route::post('update/{id}',                          [App\Http\Controllers\Admin\DealerController::class, 'update'])->name('update');
        Route::delete('/{id}',                              [App\Http\Controllers\Admin\DealerController::class, 'destroy'])->name('destroy');
        Route::get('/test',                                 [App\Http\Controllers\Admin\DealerController::class, 'convertToNepali'])->name('convertToNepali');
    });

    Route::group(['prefix' => 'sales_orders', 'as' => 'sales_orders.'], function () {
        Route::get('/',                                     [App\Http\Controllers\Admin\SalesOrderController::class, 'index'])->name('index');
        Route::get('/create',                               [App\Http\Controllers\Admin\SalesOrderController::class, 'create'])->name('create');
        Route::post('',                                     [App\Http\Controllers\Admin\SalesOrderController::class, 'store'])->name('store');
        Route::get('edit/{id}',                             [App\Http\Controllers\Admin\SalesOrderController::class, 'edit'])->name('edit');
        Route::post('update/{id}',                          [App\Http\Controllers\Admin\SalesOrderController::class, 'update'])->name('update');
        Route::delete('/{id}',                              [App\Http\Controllers\Admin\SalesOrderController::class, 'destroy'])->name('destroy');
        Route::get('/view/{id}',                            [App\Http\Controllers\Admin\SalesOrderController::class, 'view'])->name('view');
        Route::get('/get-order-type',                       [App\Http\Controllers\Admin\SalesOrderController::class, 'get_order_type'])->name('get_order_type');

    });
});

