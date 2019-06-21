<?php

namespace App\Http\Controllers\Admin;
use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\TgundulRequest as StoreRequest;
use App\Http\Requests\TgundulRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
/**
 * Class TrumputCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class TgundulCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Tgundul');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/tgundul');
        $this->crud->setEntityNameStrings('tanah gundul', 'tanah gundul');
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
            'type' => 'date',
        ]);
        $this->crud->addField([
            'name' => 'lima',
            'label' => '5cm',
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'sepuluh',
            'label' => '10cm',
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'duapuluh',
            'label' => '20cm',
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'limapuluh',
            'label' => '50cm',
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'seratus',
            'label' => '100cm',
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'jam',
            'label' => 'jam',
            'type' => 'select_from_array',
            'options' => ['7' => '07.00 W.S', '13' => '13.00 W.S', '18'=>'18.00 W.S']
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
        $this->crud->addColumns(['tanggal','lima','sepuluh','duapuluh',
            'limapuluh', 'seratus'
        ]);

        $this->crud->setColumnDetails('tanggal',['label' => 'Tanggal']);
        $this->crud->setColumnDetails('lima',['label' => '5cm']);
        $this->crud->setColumnDetails('sepuluh',['label' => '10cm']);
        $this->crud->setColumnDetails('duapuluh',['label' => '20cm']);
        $this->crud->setColumnDetails('limapuluh',['label' => '50cm']);
        $this->crud->setColumnDetails('seratus',['label' => '100cm']);
        // add asterisk for fields that are required in TrumputRequest
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

        
          $this->crud->addFilter([ // select2_ajax filter
          'name' => 'stasiun_id',
          'type' => 'select2_ajax',
          'label'=> 'Stasiun',
          'placeholder' => 'Pilih Stasiun'
        ],
        url('admin/tekanan/ajax-stasiun-options'), // the ajax route
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
        Excel::import(new TgundulImport, public_path('/uploads/'.$nama_file));
        \Alert::success(trans('backpack::crud.insert_success'))->flash();
        return redirect('/admin/tgundul')->with('success', 'Data berhasil terimport!');
    }

    public function stasiunOptions(Request $request) {
      $term = $request->input('term');
      $options = DB::table('stasiuns')->where('nama_stasiun', 'like', '%'.$term.'%')->get()->pluck('nama_stasiun', 'id');
      return $options;
    }
}
