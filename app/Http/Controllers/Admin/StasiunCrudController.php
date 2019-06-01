<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\StasiunRequest as StoreRequest;
use App\Http\Requests\StasiunRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class StasiunCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class StasiunCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Stasiun');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/stasiun');
        $this->crud->setEntityNameStrings('stasiun', 'stasiun');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();

        $this->crud->addField([
            'name' => 'provinsi',
            'label' => 'Provinsi',
            'type' => 'text',
            'default' => 'Papua',
        ]);

        $this->crud->addField([
            'name' => 'kabupaten',
            'label' => 'Kabupaten',
            'type' => 'select2_from_array',
            'options' => [ 'merauke' => 'Merauke', 'timika' => 'Timika', 'boven digoel' => 'Boven Digoel', 'mappi' => 'Mappi', 'asmat' => 'Asmat', 'mimika' => 'Mimika' ],
        ]);

        $this->crud->addField([
            'name' => 'kecamatan',
            'label' => 'kecamatan',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'nama',
            'label' => 'Nama Stasiun',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'lintang',
            'label' => 'Lintang',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'bujur',
            'label' => 'Bujur',
            'type' => 'text',
        ]);

        //Add Columns
        $this->crud->addColumn([
            'name' => 'provinsi',
            'label' => 'Provinsi',
        ]);

        $this->crud->addColumn([
            'name' => 'kabupaten',
            'label' => 'Kabupaten',
        ]);

        $this->crud->addColumn([
            'name' => 'kecamatan',
            'label' => 'kecamatan',
        ]);

        $this->crud->addColumn([
            'name' => 'nama',
            'label' => 'Nama Stasiun',
        ]);

        $this->crud->addColumn([
            'name' => 'lintang',
            'label' => 'Lintang',
        ]);

        $this->crud->addColumn([
            'name' => 'bujur',
            'label' => 'Bujur',
        ]);

        // add asterisk for fields that are required in StasiunRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');

    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
