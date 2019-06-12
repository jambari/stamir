<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Imports\HujansImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Reader;
// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\HujanRequest as StoreRequest;
use App\Http\Requests\HujanRequest as UpdateRequest;
use Illuminate\Http\Request;
use Backpack\CRUD\CrudPanel;

use App\Models\Hujan;
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
           'type' => 'text',
           'name' => 'stasiun'// force the related options to be a custom query, instead of all(); you 
        ]);

        $this->crud->addField([
            'name' => 'total',
            'label' => 'Curah Hujan',
            'type' => 'text',
        ]);

        $columns = [
            [
                'name' => 'tanggal',
                'label' => 'Tanggal'
            ], [
                'name' => 'stasiun',
                'label' => 'Stasiun'
            ], [
                'name' => 'total',
                'label' => 'Jumlah Hujan'
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
        Excel::import(new HujansImport, public_path('/uploads/'.$nama_file));
        \Alert::success(trans('backpack::crud.insert_success'))->flash();
        return redirect('/admin/hujan')->with('success', 'Data berhasil terimport!');
    }
}
