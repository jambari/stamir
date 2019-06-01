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
        $this->crud->setEntityNameStrings('hujan', 'semua hujan');

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
           'label' => "Stasiun",
           'type' => 'select2',
           'name' => 'stasiun_id', // the db column for the foreign key
           'entity' => 'stasiun', // the method that defines the relationship in your Model
           'attribute' => 'nama', // foreign key attribute that is shown to user
           'model' => "App\Models\Stasiun", // foreign key model

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

        $columns = [
            [
                'name' => 'tanggal',
                'label' => 'Tanggal'
            ], [
                'name' => 'stasiun_id',
                'label' => 'Stasiun'
            ], [
                'name' => 'total',
                'label' => 'Jumlah Hujan'
            ], [
                'name' => 'keterangan',
                'label' => 'Keterangan'
            ], [
                'name' => 'petugas',
                'label' => 'Petugas'
            ]
        ];
        $this->crud->addColumns($columns); 

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();

        // add asterisk for fields that are required in HujanRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');

        $this->crud->addFilter([ // daterange filter
           'type' => 'date_range',
           'name' => 'tanggal',
           'label'=> 'Tanggal'
         ],
         true,
         function($value) { // if the filter is active, apply these constraints
           $dates = json_decode($value);
           $this->crud->addClause('where', 'tanggal', '>=', $dates->from);
           $this->crud->addClause('where', 'tanggal', '<=', $dates->to . ' 23:59:59');
         });

        //filter hujan
        //
        $this->crud->addFilter([
          'name' => 'total',
          'type' => 'range',
          'label'=> 'Hujan',
          'label_from' => 'min ',
          'label_to' => 'max '
        ],
        true,
        function($value) { // if the filter is active
                    $range = json_decode($value);
                    if ($range->from) {
                        $this->crud->addClause('where', 'total', '>=', (float) $range->from);
                    }
                    if ($range->to) {
                        $this->crud->addClause('where', 'total', '<=', (float) $range->to);
                    }
        });
// filter nama stasiun
    // $this->crud->addFilter([ // select2_ajax filter
    //     'name' => 'stasiun_id',
    //     'type' => 'select2_ajax',
    //     'label'=> 'Stasiun',
    //     'placeholder' => 'Pilih Stasiun'
    // ],
    //     url('admin/hujan/ajax-stasiun-options'), // the ajax route
    //     function($value) { // if the filter is active
    //         $this->crud->addClause('where', 'stasiun_id', $value);
    // });
        //export
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

    // public function stasiunOptions(Request $request) {
    //   $term = $request->input('term');
    //   $options = App\Models\Stasiun::where('nama', 'like', '%'.$term.'%')->get()->pluck('nama', 'id');
    //   return $options;
    // }
}
