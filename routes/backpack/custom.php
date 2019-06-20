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
    Route::get('importpage-hujan', 'ImportCrudController@importpageHujan'); //import page for hujan
    Route::post('import-hujan', 'HujanCrudController@import'); //import data hujan route

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
}); // this should be the absolute last line of this file