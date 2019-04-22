<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\HujanRequest as StoreRequest;
use App\Http\Requests\HujanRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class HujanCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class HujanCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Hujan');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/hujan');
        $this->crud->setEntityNameStrings('hujan', 'hujans');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        $this->crud->addField([
            'name' => 'tanggal',
            'label' => 'Tanggal',
            'type' => 'date_picker',
            'date_picker_options' => [
              'todayBtn' => 'linked',
              'format' => 'dd-mm-yyyy',
           ],
        ]);

        $this->crud->addField([
            'name' => 'stasiun',
            'label' => 'Stasiun',
            'type' => 'select_multiple',
            'entity' => 'stasiuns', // the method that defines the relationship in your Model
            'attribute' => 'nama', // foreign key attribute that is shown to user
            'model' => "App\Models\Stasiun", // foreign key model
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?

           // optional
           'options'   => (function ($query) {
                return $query->orderBy('nama', 'ASC')->get();
            }), // force the related options to be a custom query, instead of all(); you 
        ]);

        $this->crud->addField([
            'name' => 'total',
            'label' => 'Curah Hujan',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'keterangan',
            'label' => 'Keterangan',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'petugas',
            'label' => 'Petugas',
            'type' => 'text',
        ]);

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();

        // add asterisk for fields that are required in HujanRequest
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
