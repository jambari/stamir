<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\GundulRequest as StoreRequest;
use App\Http\Requests\GundulRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class GundulCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class GundulCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Gundul');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/gundul');
        $this->crud->setEntityNameStrings('temperatur tanah gundul', 'temperatur tanah gundul');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();
        $this->crud->addField([
            'name' => 'tanggal',
            'label' => 'Tanggal',
            'type' => 'date',
        ]);
        $this->crud->addField([
            'name' => 'lima',
            'label' => '5cm',
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'sepuluh',
            'label' => '10cm',
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'duapuluh',
            'label' => '20cm',
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'limapuluh',
            'label' => '50cm',
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'seratus',
            'label' => '100cm',
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'jam',
            'label' => 'jam',
            'type' => 'select_from_array',
            'options' => ['7' => '07.00 W.S', '14' => '14.00 W.S', '18'=>'18.00 W.S']
        ]);

        $this->crud->addColumns(['tanggal','lima','sepuluh','duapuluh',
            'limapuluh', 'seratus'
        ]);
        $this->crud->setColumnDetails('tanggal',['label' => 'Tanggal']);
        $this->crud->setColumnDetails('lima',['label' => '5cm']);
        $this->crud->setColumnDetails('sepuluh',['label' => '10cm']);
        $this->crud->setColumnDetails('duapuluh',['label' => '20cm']);
        $this->crud->setColumnDetails('limapuluh',['label' => '50cm']);
        $this->crud->setColumnDetails('seratus',['label' => '100cm']);

        // add asterisk for fields that are required in GundulRequest
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
