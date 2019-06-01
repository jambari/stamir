<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CalibrationRequest as StoreRequest;
use App\Http\Requests\CalibrationRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class CalibrationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class CalibrationCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Calibration');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/calibration');
        $this->crud->setEntityNameStrings('kalibrasi', 'kalibrasi');

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
            'type' => 'date_picker',
        ]);

        $this->crud->addField([
           'label' => "Alat",
           'type' => 'select2',
           'name' => 'alat_id', // the db column for the foreign key
           'entity' => 'alat', // the method that defines the relationship in your Model
           'attribute' => 'nama', // foreign key attribute that is shown to user
           'model' => "App\Models\Alat", // foreign key model

           // optional
           'options'   => (function ($query) {
                return $query->orderBy('nama', 'ASC')->get();
            }), // force the related options to be a custom query, instead of all(); you 
        ]);

        $this->crud->addField([
            'name' => 'oleh',
            'label' => 'Dikalibrasi oleh',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'foto1',
            'label' => 'Foto 1',
            'type' => 'browse'
        ]);

        $this->crud->addField([
            'name' => 'foto2',
            'label' => 'Foto 2',
            'type' => 'browse'
        ]);

        $this->crud->addField([
            'name' => 'foto3',
            'label' => 'Foto 3',
            'type' => 'browse'
        ]);

        $this->crud->addColumn([
           'label' => "Alat",
           'name' => 'alat_id', // the db column for the foreign key
        ]);

        $this->crud->addColumn([
            'name' => 'tanggal',
            'label' => 'Tanggal',
        ]);

        $this->crud->addColumn([
            'name' => 'oleh',
            'label' => 'Dikalibrasi oleh',
        ]);
        // add asterisk for fields that are required in CalibrationRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
        $this->crud->allowAccess('show');
        $this->crud->enableDetailsRow();
        $this->crud->allowAccess('details_row');
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

    public function showDetailsRow($id) {
        $fotos = $this->crud->getEntry($id);
        return view('vendor.backpack.crud.calibration_details_row', compact('fotos'));
    }
}
