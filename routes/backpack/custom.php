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
    CRUD::resource('agm1a', 'Agm1aCrudController');
    CRUD::resource('agm1b', 'Agm1bCrudController');
    CRUD::resource('alat', 'AlatCrudController');
    CRUD::resource('calibration', 'CalibrationCrudController');
}); // this should be the absolute last line of this file