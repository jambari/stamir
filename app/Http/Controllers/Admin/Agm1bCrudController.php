<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\Agm1bRequest as StoreRequest;
use App\Http\Requests\Agm1bRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class Agm1bCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class Agm1bCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Agm1b');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/agm1b');
        $this->crud->setEntityNameStrings('agm1b', 'agm1bs');

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
            'type' => 'date_picker'
        ]);
        $this->crud->addField([
            'name' => 'gundul_i_5cm',
            'label' => '5cm',
            'tab' => 'Tanah Gundul (07:30)'
        ]);
        $this->crud->addField([
            'name' => 'gundul_i_10cm',
            'label' => '10cm',
            'tab' => 'Tanah Gundul (07:30)'
        ]);
        $this->crud->addField([
            'name' => 'gundul_i_20cm',
            'label' => '20cm',
            'tab' => 'Tanah Gundul (07:30)'
        ]);
        //jam 13.30
        $this->crud->addField([
            'name' => 'gundul_ii_5cm',
            'label' => '5cm',
            'tab' => 'Tanah Gundul (13:30)'
        ]);
        $this->crud->addField([
            'name' => 'gundul_ii_10cm',
            'label' => '10cm',
            'tab' => 'Tanah Gundul (13:30)'
        ]);
        $this->crud->addField([
            'name' => 'gundul_ii_20cm',
            'label' => '20cm',
            'tab' => 'Tanah Gundul (13:30)'
        ]);

        //tanah gundul jam 17.30
        $this->crud->addField([
            'name' => 'gundul_iii_5cm',
            'label' => '5cm',
            'tab' => 'Tanah Gundul (17:30)'
        ]);
        $this->crud->addField([
            'name' => 'gundul_iii_10cm',
            'label' => '10cm',
            'tab' => 'Tanah Gundul (17:30)'
        ]);
        $this->crud->addField([
            'name' => 'gundul_iii_20cm',
            'label' => '20cm',
            'tab' => 'Tanah Gundul (17:30)'
        ]);
        $this->crud->addField([
            'name' => 'gundul_iii_50cm',
            'label' => '50cm',
            'tab' => 'Tanah Gundul (17:30)'
        ]);
        $this->crud->addField([
            'name' => 'gundul_iii_100cm',
            'label' => '100cm',
            'tab' => 'Tanah Gundul (17:30)'
        ]);

        //Tanah Berumput
        $this->crud->addField([
            'name' => 'berumput_i_5cm',
            'label' => '5cm',
            'tab' => 'Tanah berumput (07:30)'
        ]);
        $this->crud->addField([
            'name' => 'berumput_i_10cm',
            'label' => '10cm',
            'tab' => 'Tanah berumput (07:30)'
        ]);
        $this->crud->addField([
            'name' => 'berumput_i_20cm',
            'label' => '20cm',
            'tab' => 'Tanah berumput (07:30)'
        ]);
        //jam 13.30
        $this->crud->addField([
            'name' => 'berumput_ii_5cm',
            'label' => '5cm',
            'tab' => 'Tanah berumput (13:30)'
        ]);
        $this->crud->addField([
            'name' => 'berumput_ii_10cm',
            'label' => '10cm',
            'tab' => 'Tanah berumput (13:30)'
        ]);
        $this->crud->addField([
            'name' => 'berumput_ii_20cm',
            'label' => '20cm',
            'tab' => 'Tanah berumput (13:30)'
        ]);

        //tanah berumput jam 17.30
        $this->crud->addField([
            'name' => 'berumput_iii_5cm',
            'label' => '5cm',
            'tab' => 'Tanah berumput (17:30)'
        ]);
        $this->crud->addField([
            'name' => 'berumput_iii_10cm',
            'label' => '10cm',
            'tab' => 'Tanah berumput (17:30)'
        ]);
        $this->crud->addField([
            'name' => 'berumput_iii_20cm',
            'label' => '20cm',
            'tab' => 'Tanah berumput (17:30)'
        ]);
        $this->crud->addField([
            'name' => 'berumput_iii_50cm',
            'label' => '50cm',
            'tab' => 'Tanah berumput (17:30)'
        ]);
        $this->crud->addField([
            'name' => 'berumput_iii_100cm',
            'label' => '100cm',
            'tab' => 'Tanah berumput (17:30)'
        ]);
        //keterangan
        $this->crud->addField([
            'name' => 'keterangan',
            'label' => 'Keterangan',
        ]);

        $this->crud->addColumn([
            'name' => 'tanggal',
            'label' => 'Tanggal',
        ]);
        $this->crud->addColumn([
            'name' => 'gundul_i_5cm',
            'label' => 'TG 5cm I',
        ]);
        $this->crud->addColumn([
            'name' => 'gundul_i_10cm',
            'label' => 'TG 10cm I',
        ]);
        $this->crud->addColumn([
            'name' => 'gundul_i_20cm',
            'label' => 'TG 20cm I',
        ]);
        //jam 13.30
        $this->crud->addColumn([
            'name' => 'gundul_ii_5cm',
            'label' => 'TG 5cm II',
        ]);
        $this->crud->addColumn([
            'name' => 'gundul_ii_10cm',
            'label' => 'TG 10cm II',
        ]);
        $this->crud->addColumn([
            'name' => 'gundul_ii_20cm',
            'label' => 'TG 20cm II',
        ]);

        //tanah gundul jam 17.30
        $this->crud->addColumn([
            'name' => 'gundul_iii_5cm',
            'label' => 'TG 5cm III',
        ]);
        $this->crud->addColumn([
            'name' => 'gundul_iii_10cm',
            'label' => 'TG 10cm III',
        ]);
        $this->crud->addColumn([
            'name' => 'gundul_iii_20cm',
            'label' => 'TG 20cm III',
        ]);
        $this->crud->addColumn([
            'name' => 'gundul_iii_50cm',
            'label' => 'TG 50cm III',
        ]);
        $this->crud->addColumn([
            'name' => 'gundul_iii_100cm',
            'label' => 'TG 100cm III',
        ]);

        //Tanah Berumput
        $this->crud->addColumn([
            'name' => 'berumput_i_5cm',
            'label' => 'TB 5cm I',
        ]);
        $this->crud->addColumn([
            'name' => 'berumput_i_10cm',
            'label' => 'TB 10cm I',
        ]);
        $this->crud->addColumn([
            'name' => 'berumput_i_20cm',
            'label' => 'TB 20cm I',
        ]);
        //jam 13.30
        $this->crud->addColumn([
            'name' => 'berumput_ii_5cm',
            'label' => 'TB 5cm II',
        ]);
        $this->crud->addColumn([
            'name' => 'berumput_ii_10cm',
            'label' => 'TB 10cm II',
        ]);
        $this->crud->addColumn([
            'name' => 'berumput_ii_20cm',
            'label' => 'TB 20cm II',
        ]);

        //tanah berumput jam 17.30
        $this->crud->addColumn([
            'name' => 'berumput_iii_5cm',
            'label' => 'TB 5cm III',
        ]);
        $this->crud->addColumn([
            'name' => 'berumput_iii_10cm',
            'label' => 'TB 10cm III',
        ]);
        $this->crud->addColumn([
            'name' => 'berumput_iii_20cm',
            'label' => 'TB 20cm III',
        ]);
        $this->crud->addColumn([
            'name' => 'berumput_iii_50cm',
            'label' => 'TB 50cm III',
        ]);
        $this->crud->addColumn([
            'name' => 'berumput_iii_100cm',
            'label' => 'TB 100cm III',
        ]);
        //keterangan
        $this->crud->addColumn([
            'name' => 'keterangan',
            'label' => 'Keterangan',
        ]);
        //export
        $this->crud->enableExportButtons();
        // add asterisk for fields that are required in Agm1bRequest
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
