<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\PenyinaranRequest as StoreRequest;
use App\Http\Requests\PenyinaranRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class PenyinaranCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class PenyinaranCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Penyinaran');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/penyinaran');
        $this->crud->setEntityNameStrings('penyinaran', 'penyinarans');

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
            'type' => 'date'
        ]);
        $this->crud->addField([
            'name' => 'sinar',
            'label' => 'Sinar Matahari',
            'type' => 'text'
        ]);

        $this->crud->setColumnDetails('sinar', ['label'=>'Sinar Matahari']);
        // add asterisk for fields that are required in PenyinaranRequest
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
