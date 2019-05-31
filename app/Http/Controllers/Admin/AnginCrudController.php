<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\AnginRequest as StoreRequest;
use App\Http\Requests\AnginRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class AnginCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class AnginCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Angin');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/angin');
        $this->crud->setEntityNameStrings('angin', 'angins');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();
        $this->crud->addField([
            'name' => 'tanggal',
            'label' => 'Tanggal',
            'type' => 'date',
        ]);
        $this->crud->addField([
            'name' => 'kec_rata',
            'label' => 'Kecepatan rata-rata antara waktu',
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'angin_arah',
            'label' => 'Arah pada waktu peramatan',
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'angin_kec',
            'label' => 'Kecepatan pada waktu peramatan',
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'jam',
            'label' => 'jam',
            'type' => 'select_from_array',
            'options' => ['7' => '07.00 W.S', '14' => '14.00 W.S', '18'=>'18.00 W.S']
        ]);
        $this->crud->addColumns(['tanggal', 'kec_rata', 'angin_arah', 'angin_kec', 'jam']); 
        $this->crud->setColumnDetails('kec_rata', ['label' => 'rata-rata antara waktu']);
        $this->crud->setColumnDetails('angin_arah', ['label' => 'Arah angin']);
        $this->crud->setColumnDetails('angin_kec', ['label' => 'Kecepatan Angin']);

        // add asterisk for fields that are required in AnginRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
        $this->crud->enableExportButtons();
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
