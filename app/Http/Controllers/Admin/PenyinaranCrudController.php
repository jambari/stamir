<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Imports\PenyinaransImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Reader;
// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\PenyinaranRequest as StoreRequest;
use App\Http\Requests\PenyinaranRequest as UpdateRequest;
use Illuminate\Http\Request;
use Backpack\CRUD\CrudPanel;

use App\Models\Penyinaran;
/**
 * Class HujanCrudController
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
        $this->crud->setEntityNameStrings('SSS', 'semua SSS');

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
            'name' => 'sss',
            'label' => 'SSS',
            'type' => 'text',
        ]);

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
        $columns = [
            [
                'name' => 'tanggal',
                'label' => 'Tanggal'
            ], [
                'name' => 'sss',
                'label' => 'SSS'
            ], [
                'name' => 'stasiun_id',
                'label' => 'Stasiun'
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
          'name' => 'sss',
          'type' => 'range',
          'label'=> 'SSS',
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
        $this->crud->addFilter([ // select2_ajax filter
          'name' => 'stasiun_id',
          'type' => 'select2_ajax',
          'label'=> 'Stasiun',
          'placeholder' => 'Pilih Stasiun'
        ],
        url('admin/bolakering/ajax-stasiun-options'), // the ajax route
        function($value) { // if the filter is active
            $this->crud->addClause('where', 'stasiun_id', $value);
        });
        //export
        $this->crud->enableExportButtons();

    $this->crud->orderBy('id', 'desc');
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
    public function import(Request $request) 
    {
        //Validasi tipe data
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        //Ambil file yang terupload
        $file = $request->file('file'); 
        //buat nama file sembarang
        $nama_file = rand().$file->getClientOriginalName();
        // menaruh fil di folder public
        $file->move('uploads',$nama_file);
        //mengimport ke database
        Excel::import(new PenyinaransImport, public_path('/uploads/'.$nama_file));
        \Alert::success(trans('backpack::crud.insert_success'))->flash();
        return redirect('/admin/penyinaran')->with('success', 'Data berhasil terimport!');
    }

    public function stasiunOptions(Request $request) {
      $term = $request->input('term');
      $options = DB::table('stasiuns')->where('nama_stasiun', 'like', '%'.$term.'%')->get()->pluck('nama_stasiun', 'id');
      return $options;
    }
}
