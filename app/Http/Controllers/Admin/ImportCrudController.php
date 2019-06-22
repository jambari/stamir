<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ImportRequest as StoreRequest;
use App\Http\Requests\ImportRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class ImportCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ImportCrudController extends CrudController
{
    // public function setup()
    // {
    //     /*
    //     |--------------------------------------------------------------------------
    //     | CrudPanel Basic Information
    //     |--------------------------------------------------------------------------
    //     */
    //     $this->crud->setModel('App\Models\Import');
    //     $this->crud->setRoute(config('backpack.base.route_prefix') . '/import');
    //     $this->crud->setEntityNameStrings('import', 'imports');

    //     /*
    //     |--------------------------------------------------------------------------
    //     | CrudPanel Configuration
    //     |--------------------------------------------------------------------------
    //     */

    //     // TODO: remove setFromDb() and manually define Fields and Columns
    //     $this->crud->setFromDb();

    //     // add asterisk for fields that are required in ImportRequest
    //     $this->crud->setRequiredFields(StoreRequest::class, 'create');
    //     $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    // }

    // public function store(StoreRequest $request)
    // {
    //     // your additional operations before save here
    //     $redirect_location = parent::storeCrud($request);
    //     // your additional operations after save here
    //     // use $this->data['entry'] or $this->crud->entry
    //     return $redirect_location;
    // }

    // public function update(UpdateRequest $request)
    // {
    //     // your additional operations before save here
    //     $redirect_location = parent::updateCrud($request);
    //     // your additional operations after save here
    //     // use $this->data['entry'] or $this->crud->entry
    //     return $redirect_location;
    // }
    public function importpageHujan () {
        $route = '/admin/import-rain';
        $unsur = 'Data Hujan';
        $kolom = 'Tanggal dengan format (YYYY-MM-DD, contoh: 2019-05-23) | hujan | ID Stasiun';
        return view('imports.importpage')->with(compact('unsur', 'kolom','route'));
    }
    //Method for import Temperatur
    public function importpageTemperatur () {
        $route = '/admin/import-temperatur';
        $unsur = 'Data Temperatur';
        $kolom = 'Tanggal dengan format (YYYY-MM-DD, contoh: 2019-05-23)| BK | BB |Temperatur rumput | Jam (contoh: 07.00, 14.00, 18.00)';
        return view('imports.importpage')->with(compact('unsur', 'kolom', 'route'));
    }

    //Method for import Nisbi
    public function importpageNisbi () {
        $route = '/admin/import-nisbi';
        $unsur = 'Data Lembab Nisbi';
        $kolom = 'Tanggal dengan format (YYYY-MM-DD, contoh: 2019-05-23)| Lembab Nisbi | Jam (contoh: 07.00, 14.00, 18.00)';
        return view('imports.importpage')->with(compact('unsur', 'kolom', 'route'));
    }
}
