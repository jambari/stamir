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
            'name' => 'kode_stasiun',
            'label' => 'Kode Stasiun',
            'type' => 'text'
        ]);

        //Jenis Stasiun
        $this->crud->addField([
            'name' => 'jenis_stasiun',
            'label' => 'Jenis Stasiun',
            'type' => 'select_from_array',
            'options' => ["stasiun bmkg" => "Stasiun BMKG", "smpk" => "SMPK", "aws" => "AWS", "aaws"=> "AAWS", "arg" => "ARG", "pos hujan" => "Pos Hujan"],
            'allows_null' => false,
        ]);
        // Nomor Stasiun
        $this->crud->addField([
            'name' => 'nomor_stasiun',
            'label' => 'Nomor Stasiun',
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'zom',
            'label' => 'ZOM',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'provinsi',
            'label' => 'Provinsi',
            'type' => 'text',
            'default' => 'Papua',
        ]);

        $this->crud->addField([
            'name' => 'kabupaten',
            'label' => 'Kabupaten',
            'type' => 'text',
        ]);

        $this->crud->addField([
            'name' => 'nama_stasiun',
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
            'name' => 'nama_stasiun',
            'label' => 'Nama Stasiun',
        ]);
        $this->crud->addColumn([
            'name' => 'kode_stasiun',
            'label' => 'Kode Stasiun',
        ]);
        $this->crud->addColumn([
            'name' => 'jenis_stasiun',
            'label' => 'Jenis Stasiun',
        ]);
        //zom
        $this->crud->addColumn([
            'name' => 'zom',
            'label' => 'ZOM',
        ]);

        $this->crud->addColumn([
            'name' => 'provinsi',
            'label' => 'Provinsi',
        ]);

        $this->crud->addColumn([
            'name' => 'kabupaten',
            'label' => 'Kabupaten',
        ]);
        $this->crud->setColumnDetails('kabupaten', ['class' => 'text-primary']);
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
