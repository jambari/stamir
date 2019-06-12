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
    Route::get('importpage', 'ImportCrudController@importpage'); //import page for all models
    Route::get('import-hujan', 'HujanCrudController@import'); //import page for all models
}); // this should be the absolute last line of this file