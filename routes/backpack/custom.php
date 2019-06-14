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
    CRUD::resource('temperatur', 'TemperaturCrudController');
    CRUD::resource('nisbi', 'NisbiCrudController');
    CRUD::resource('angin', 'AnginCrudController');
    CRUD::resource('penyinaran', 'PenyinaranCrudController');
    CRUD::resource('gundul', 'GundulCrudController');
    CRUD::resource('trumput', 'TrumputCrudController');
    //Import Excel Section
    Route::get('importpage-hujan', 'ImportCrudController@importpageHujan'); //import page for hujan
    Route::post('import-hujan', 'HujanCrudController@import'); //import data hujan route
    Route::get('importpage-temperatur', 'ImportCrudController@importpageTemperatur'); //import page for temperatur
    Route::post('import-temperatur', 'TemperaturCrudController@import'); //import data temperatur route
    Route::get('importpage-nisbi', 'ImportCrudController@importpageNisbi'); //import page for nisbi
    Route::post('import-nisbi', 'NisbiCrudController@import'); //import data temperatur route
}); // this should be the absolute last line of this file