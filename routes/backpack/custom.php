<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('stasiun', 'StasiunCrudController');
	Route::get('hujan/ajax-stasiun-options', 'HujanCrudController@stasiunOptions'); //filter stasiun
    CRUD::resource('hujan', 'HujanCrudController');
    CRUD::resource('alat', 'AlatCrudController');
    CRUD::resource('calibration', 'CalibrationCrudController');



    //Import Excel Section
    Route::get('importpage-rain', 'ImportCrudController@importpageHujan'); //import page for hujan
    Route::post('import-rain', 'RainCrudController@import'); //import data hujan route

    //Bola Kering
    Route::get('bolakering/ajax-alat-options', 'BolakeringCrudController@alatOptions');
    Route::get('bolakering/ajax-stasiun-options', 'BolakeringCrudController@stasiunOptions');
    CRUD::resource('bolakering', 'BolakeringCrudController');

    Route::get('bolabasah/ajax-alat-options', 'BolabasahCrudController@alatOptions');
    Route::get('bolabasah/ajax-stasiun-options', 'BolabasahCrudController@stasiunOptions');
    CRUD::resource('bolabasah', 'BolabasahCrudController');

    Route::get('dewpoint/ajax-alat-options', 'DewpointCrudController@alatOptions');
    Route::get('dewpoint/ajax-stasiun-options', 'DewpointCrudController@stasiunOptions');
    CRUD::resource('dewpoint', 'DewpointCrudController');

    Route::get('humidity/ajax-alat-options', 'HumidityCrudController@alatOptions');
    Route::get('humidity/ajax-stasiun-options', 'HumidityCrudController@stasiunOptions');
    CRUD::resource('humidity', 'HumidityCrudController');

    Route::get('rain/ajax-stasiun-options', 'RainCrudController@stasiunOptions');
    CRUD::resource('rain', 'RainCrudController');

    Route::get('penyinaran/ajax-stasiun-options', 'PenyinaranCrudController@stasiunOptions');
    CRUD::resource('penyinaran', 'PenyinaranCrudController');

    Route::get('arahangin/ajax-stasiun-options', 'ArahanginCrudController@stasiunOptions');
    CRUD::resource('arahangin', 'ArahanginCrudController');

    Route::get('kecangin/ajax-stasiun-options', 'KecanginCrudController@stasiunOptions');
    CRUD::resource('kecangin', 'KecanginCrudController');

    Route::get('tekanan/ajax-stasiun-options', 'TekananCrudController@stasiunOptions');
    CRUD::resource('tekanan', 'TekananCrudController');

    Route::get('penguapan/ajax-stasiun-options', 'PenguapanCrudController@stasiunOptions');
    CRUD::resource('penguapan', 'PenguapanCrudController');

    Route::get('tmax/ajax-stasiun-options', 'TmaxCrudController@stasiunOptions');
    CRUD::resource('tmax', 'TmaxCrudController');

    Route::get('tmin/ajax-stasiun-options', 'TminCrudController@stasiunOptions');
    CRUD::resource('tmin', 'TminCrudController');

    Route::get('radiasi/ajax-stasiun-options', 'RadiasiCrudController@stasiunOptions');
    CRUD::resource('radiasi', 'RadiasiCrudController');

    Route::get('trumput/ajax-stasiun-options', 'TrumputCrudController@stasiunOptions');
    CRUD::resource('trumput', 'TrumputCrudController');

    Route::get('tgundul/ajax-stasiun-options', 'TgundulCrudController@stasiunOptions');
    CRUD::resource('tgundul', 'TgundulCrudController');
}); // this should be the absolute last line of this file