<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\AlatRequest as StoreRequest;
use App\Http\Requests\AlatRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class AlatCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class AlatCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Alat');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/alat');
        $this->crud->setEntityNameStrings('alat', 'alat-alat');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();
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
            }), // force the related options to be a custom query, instead of all(); you 
        'tab' => 'Informasi Utama',
        ]);
        //tambah kolom
        $this->crud->addColumn([
            'name' => 'stasiun_id',
            'label' => 'Stasiun',
        ]);
        $this->crud->addField([
            'name' => 'tanggal',
            'label' => 'Tanggal Pemasangan',
            'type' => 'date_picker',
            'tab' => 'Informasi Utama',
        ]);
        $this->crud->addColumn([
            'name' => 'tanggal',
            'label' => 'Pemasangan',
        ]);
        $this->crud->addField([
            'name' => 'nama',
            'label' => 'Nama Alat',
            'type' => 'text',
            'tab' => 'Informasi Utama',
        ]);

        $this->crud->addColumn([
            'name' => 'nama',
            'label' => 'Nama',
        ]);
        $this->crud->addField([
            'name' => 'tipe',
            'label' => 'Tipe',
            'type' => 'text',
            'tab' => 'Informasi Utama',
        ]);
        $this->crud->addColumn([
            'name' => 'tipe',
            'label' => 'Tipe',
        ]);
        $this->crud->addField([
            'name' => 'merk',
            'label' => 'Merk',
            'type' => 'text',
            'tab' => 'Informasi Utama',
        ]);
        $this->crud->addColumn([
            'name' => 'merk',
            'label' => 'Merk',
        ]);
        $this->crud->addField([
            'name' => 'desa',
            'label' => 'Desa',
            'type' => 'text',
            'tab' => 'Alamat',
        ]);
        $this->crud->addField([
            'name' => 'kecamatan',
            'label' => 'Kecamatan',
            'type' => 'text',
            'tab' => 'Alamat',
        ]);
        $this->crud->addField([
            'name' => 'instansi',
            'label' => 'Instansi',
            'type' => 'text',
            'tab' => 'Pengelola',
        ]);
        $this->crud->addField([
            'name' => 'alamat_instansi',
            'label' => 'Alamat Instansi',
            'type' => 'text',
            'tab' => 'Pengelola',
        ]);
        //Lingkungan
        $this->crud->addField([
            'name' => 'lingkungan',
            'label' => 'Lingkungan',
            'type' => 'text',
            'tab' => 'Lingkungan',
        ]);
        $this->crud->addField([
            'name' => 'orografi',
            'label' => 'Orografi',
            'type' => 'text',
            'tab' => 'Lingkungan',
        ]);
        //Detail
        $this->crud->addField([
            'name' => 'kepemilikan',
            'label' => 'Kepemilikan alat',
            'type' => 'text',
            'tab' => 'Kepemilikan',
        ]);
        $this->crud->addField([
            'name' => 'kondisi_alat',
            'label' => 'Kondisi',
            'type' => 'select_from_array',
            'options' => ["baik" => "Baik", "sedang" => "Sedang", "rusak" => "Rusak"],
            "default" => "baik",
            'tab' => 'Kepemilikan',
        ]);
        $this->crud->addField([
            'name' => 'pagar',
            'label' => 'Pagar',
            'type' => 'select_from_array',
            'options' => ["tidak ada" => "Tidak ada", "baik" => "Baik", "sedang" => "Sedang", "rusak" => "Rusak"],
            "default" => "tidak ada",
            'tab' => 'Kepemilikan',
        ]);
        $this->crud->addField([
            'name' => 'aktifitas',
            'label' => 'Aktifitas',
            'type' => 'select_from_array',
            'options' => ["aktif" => "Aktif", "tidak aktif" => "Tidak Aktif"],
            "default" => "aktif",
            'tab' => 'Kepemilikan',
        ]);
        $this->crud->addField([
            'name' => 'sample_prakiraan',
            'label' => 'Sampel Perkiraan',
             'type' => 'select_from_array',
            'options' => ["ya" => "Ya", "tidak" => "Tidak"],
            "default" => "ya",
            'tab' => 'Kepemilikan',
        ]);

        $this->crud->addField([
            'name' => 'dipasang_oleh',
            'label' => 'Dipasang Oleh',
            'type' => 'text',
        ]);

        $this->crud->setColumnDetails('tanggal', ['label'=>'Pemasangan']);
        // add asterisk for fields that are required in AlatRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete', 'kalibrasi']);
        // $this->crud->addButtonFromView('line', 'press' , 'kalibrasi', 'end');
        // $this->crud->enableDetailsRow();
        // $this->crud->allowAccess('details_row'); 
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
}
