<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\NisbiRequest as StoreRequest;
use App\Http\Requests\NisbiRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class NisbiCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class NisbiCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Nisbi');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/nisbi');
        $this->crud->setEntityNameStrings('Lembab Nisbi ', 'Lembab Nisbi');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();
        $this->crud->addField([
            'name' => 'jam',
            'label' => 'jam',
            'type' => 'select_from_array',
            'options' => ['7' => '07.00 W.S', '14' => '14.00 W.S', '18'=>'18.00 W.S']
        ]);
        $this->crud->addColumns(['tanggal','lembab_nisbi', 'jam']);
        // add asterisk for fields that are required in NisbiRequest
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
