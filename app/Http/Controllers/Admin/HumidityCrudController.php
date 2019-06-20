<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\HumidityRequest as StoreRequest;
use App\Http\Requests\HumidityRequest as UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Alat;
use Illuminate\Support\Facades\DB;
use Backpack\CRUD\CrudPanel;

/**
 * Class DewpointCrudControllersCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class HumidityCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Humidity');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/humidity');
        $this->crud->setEntityNameStrings('Rh', 'Rh');

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
        //tambah kolom
        $this->crud->addColumn([
            'name' => 'tanggal',
            'label' => 'Tanggal',
        ]);

        $this->crud->addField([
            'name' => 'humidity',
            'label' => 'Rh',
            'type' => 'text'
        ]);


        $this->crud->addColumn([
            'name' => 'humidity',
            'label' => 'Rh',
        ]);


        $this->crud->addField([
            'name' => 'jam',
            'label' => 'jam',
            'type' => 'select_from_array',
            'options' => ['0' => '00.00 W.S','1' => '01.00 W.S',
                '2' =>'02.00 W.S','3' => '03.00 W.S',
                '4'=>'04.00 W.S','5'=>'05.00 W.S','6'=>'06.00 W.S',
                '7' => '07.00 W.S', '8' => '08.00 W.S',
                '9' => '09.00 W.S', '10' => '10.00 W.S',
                '11' => '11.00 W.S', '12' => '12.00 W.S',
                '12' => '12.00 W.S', '13' => '13.00 W.S',  
                '14' => '14.00 W.S', '15'=>'15.00 W.S',
                '16' => '16.00 W.S', '17' => '17.00 W.S',
                '18' => '18.00 W.S', '19' => '19.00 W.S',
                '20' => '20.00 W.S', '21' => '21.00 W.S',  
                '22' => '22.00 W.S', '23'=>'23.00 W.S',
            ]
        ]);

        $this->crud->addColumn([
            'name' => 'jam',
            'label' => 'Jam',
        ]);

        // $this->crud->addField([
        //    'label' => "Alat",
        //    'type' => 'select2',
        //    'name' => 'alat_id', // the db column for the foreign key
        //    'entity' => 'alat', // the method that defines the relationship in your Model
        //    'attribute' => 'nama', // foreign key attribute that is shown to user
        //    'model' => "App\Models\Alat", // foreign key model

        //    // optional
        //    'options'   => (function ($query) {
        //         return $query->orderBy('nama', 'ASC')->get();
        //     }), 
        // ]);

        // $this->crud->addColumn([
        //     'name' => 'alat_id',
        //     'label' => 'Alat',
        // ]);

        $this->crud->addField([
           'label' => "Stasiun",
           'type' => 'select2',
           'name' => 'stasiun_id', // the db column for the foreign key
           'entity' => 'stasiun', // the method that defines the relationship in your Model
           'attribute' => 'nama_stasiun', // foreign key attribute that is shown to user
           'model' => "App\Models\Stasiun", // foreign key model

           // optional
           'options'   => (function ($query) {
                return $query->orderBy('nama_stasiun', 'ASC')->get();
            }), // force the related options to be a custom query, instead of
        ]);

        $this->crud->addColumn([
            'name' => 'stasiun_id',
            'label' => 'Stasiun',
        ]);
        // add asterisk for fields that are required in DewpointCrudControllersRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
        $this->crud->enableExportButtons();
        //filter
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

        $this->crud->addFilter([
            'name' => 'humidity',
            'type' => 'range',
            'label'=> 'Rh',
            'label_from' => 'min ',
            'label_to' => 'max '
        ],
        true,
        function($value) { // if the filter is active
                    $range = json_decode($value);
                    if ($range->from) {
                        $this->crud->addClause('where', 'humidity', '>=', (float) $range->from);
                    }
                    if ($range->to) {
                        $this->crud->addClause('where', 'humidity', '<=', (float) $range->to);
                    }
        });
        //Jam
        $this->crud->addFilter([ // select2 filter
          'name' => 'jam',
          'type' => 'select2',
          'label'=> 'Jam'
        ], function() {
            return [
                    0 => '00.00 W.S',
                    1 => '01.00 W.S',
                    2 => '02.00 W.S',
                    3 => '03.00 W.S',
                    4 => '04.00 W.S',
                    5 => '05.00 W.S',
                    6 => '06.00 W.S',
                    7 => '07.00 W.S',
                    8 => '08.00 W.S',
                    9 => '09.00 W.S',
                    10 => '10.00 W.S',
                    11 => '11.00 W.S',
                    12 => '12.00 W.S',
                    13 => '13.00 W.S',
                    14 => '14.00 W.S',
                    15 => '15.00 W.S',
                    16 => '16.00 W.S',
                    17 => '17.00 W.S',
                    18 => '18.00 W.S',
                    19 => '19.00 W.S',
                    20 => '20.00 W.S',
                    21 => '21.00 W.S',
                    22 => '22.00 W.S',
                    23 => '23.00 W.S',
                    ];
        }, function($value) { // if the filter is active
             $this->crud->addClause('where', 'jam', $value);
        });
        // Alat
        // $this->crud->addFilter([ // select2_ajax filter
        //   'name' => 'alat_id',
        //   'type' => 'select2_ajax',
        //   'label'=> 'Alat',
        //   'placeholder' => 'Pilih Alat'
        // ],
        // url('admin/humidity/ajax-alat-options'), // the ajax route
        // function($value) { // if the filter is active
        //     $this->crud->addClause('where', 'alat_id', $value);
        // });
        //filter stasiun
        $this->crud->addFilter([ // select2_ajax filter
          'name' => 'stasiun_id',
          'type' => 'select2_ajax',
          'label'=> 'Stasiun',
          'placeholder' => 'Pilih Stasiun'
        ],
        url('admin/humidity/ajax-stasiun-options'), // the ajax route
        function($value) { // if the filter is active
            $this->crud->addClause('where', 'stasiun_id', $value);
        });
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

    public function alatOptions(Request $request) {
      $term = $request->input('term');
      $options = DB::table('alats')->where('nama', 'like', '%'.$term.'%')->get()->pluck('nama', 'id');
      return $options;
    }

    //Filter stasiun method
    public function stasiunOptions(Request $request) {
      $term = $request->input('term');
      $options = DB::table('stasiuns')->where('nama_stasiun', 'like', '%'.$term.'%')->get()->pluck('nama_stasiun', 'id');
      return $options;
    }
}
