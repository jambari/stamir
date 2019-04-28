<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\Agm1aRequest as StoreRequest;
use App\Http\Requests\Agm1aRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class Agm1aCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class Agm1aCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Agm1a');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/agm1a');
        $this->crud->setEntityNameStrings('agm1a', 'agm1as');

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
        //Temperatur
        $this->crud->addField([
            'name' => 'temp_bk_i',
            'label' => 'Bola Kering I',
            'type' => 'text',
            'tab' => 'Temperatur'
        ]);
       $this->crud->addField([
            'name' => 'temp_bb_i',
            'label' => 'Bola Basah I',
            'type' => 'text',
            'tab' => 'Temperatur'
        ]);
        $this->crud->addField([
            'name' => 'temp_bk_ii',
            'label' => 'Bola Kering II',
            'type' => 'text',
            'tab' => 'Temperatur'
        ]);
        $this->crud->addField([
            'name' => 'temp_bb_ii',
            'label' => 'Bola Basah II',
            'type' => 'text',
            'tab' => 'Temperatur'
        ]);
        $this->crud->addField([
            'name' => 'temp_bk_iii',
            'label' => 'Bola Kering III',
            'type' => 'text',
            'tab' => 'Temperatur'
        ]);
        $this->crud->addField([
            'name' => 'temp_bb_iii',
            'label' => 'Bola Basah III',
            'type' => 'text',
            'tab' => 'Temperatur'
        ]);
        $this->crud->addField([
            'name' => 'temp_rumput_i',
            'label' => 'Rumput Min I',
            'type' => 'text',
            'tab' => 'Temperatur'
        ]);
        $this->crud->addField([
            'name' => 'temp_rumput_ii',
            'label' => 'Min II',
            'type' => 'text',
            'tab' => 'Temperatur'
        ]);
        $this->crud->addField([
            'name' => 'temp_rumput_iii',
            'label' => 'Max III',
            'type' => 'text',
            'tab' => 'Temperatur'
        ]);
        //Lembap Nisbi
        $this->crud->addField([
            'name' => 'lembab_nisbi_i',
            'label' => 'Lembab Nisbi I (07:00 W.S)',
            'type' => 'text',
            'tab' => 'Lembab Nisbi'
        ]);
        $this->crud->addField([
            'name' => 'lembab_nisbi_ii',
            'label' => 'Lembab Nisbi II (14:00 W.S)',
            'type' => 'text',
            'tab' => 'Lembab Nisbi'
        ]);
        $this->crud->addField([
            'name' => 'lembab_nisbi_iii',
            'label' => 'Lembab Nisbi III (18:00 W.S)',
            'type' => 'text',
            'tab' => 'Lembab Nisbi'
        ]);

        //Angin
        $this->crud->addField([
            'name' => 'angin_kec_rata_i',
            'label' => 'Kecepatan rata-rata I (07:00 W.S)',
            'type' => 'text',
            'tab' => 'Angin'
        ]);
        $this->crud->addField([
            'name' => 'angin_kec_rata_ii',
            'label' => 'Kecepatan rata-rata II (14:00 W.S)',
            'type' => 'text',
            'tab' => 'Angin'
        ]);
        $this->crud->addField([
            'name' => 'angin_kec_rata_iii',
            'label' => 'Kecepatan rata-rata III (18:00 W.S)',
            'type' => 'text',
            'tab' => 'Angin'
        ]);
        //Arah angin
        $this->crud->addField([
            'name' => 'angin_arah_i',
            'label' => 'Arah Angin I (07:00 W.S)',
            'type' => 'text',
            'tab' => 'Angin'
        ]);
        $this->crud->addField([
            'name' => 'angin_arah_ii',
            'label' => 'Arah Angin II (14:00 W.S)',
            'type' => 'text',
            'tab' => 'Angin'
        ]);
        $this->crud->addField([
            'name' => 'angin_arah_iii',
            'label' => 'Arah Angin III (18:00 W.S)',
            'type' => 'text',
            'tab' => 'Angin'
        ]);

        // Kecepatan Angin 
        $this->crud->addField([
            'name' => 'angin_kec_i',
            'label' => 'Kecepatan Angin I (07:00 W.S)',
            'type' => 'text',
            'tab' => 'Angin'
        ]);
        $this->crud->addField([
            'name' => 'angin_kec_ii',
            'label' => 'Kecepatan Angin II (14:00 W.S)',
            'type' => 'text',
            'tab' => 'Angin'
        ]);
        $this->crud->addField([
            'name' => 'angin_kec_iii',
            'label' => 'Kecepatan Angin III (18:00 W.S)',
            'type' => 'text',
            'tab' => 'Angin'
        ]);

        // Sinar Matahari
        $this->crud->addField([
            'name' => 'sinar_matahari',
            'label' => 'Sinar Matahari',
            'type' => 'text',
            'tab' => 'Sinar Matahari'
        ]);   
        //Hujan
        $this->crud->addField([
            'name' => 'hujan',
            'label' => 'Hujan',
            'type' => 'text',
            'tab' => 'Hujan'
        ]);    
        //Uji Peramatan
        $this->crud->addField([
            'name' => 'ujiper_bk_i',
            'label' => 'BK I (07:00 W.S)',
            'type' => 'text',
            'tab' => 'Uji Peramatan'
        ]);   
        $this->crud->addField([
            'name' => 'ujiper_min_i',
            'label' => 'MIN I (07:00 W.S)',
            'type' => 'text',
            'tab' => 'Uji Peramatan'
        ]);  
        $this->crud->addField([
            'name' => 'ujiper_bk_ii',
            'label' => 'BK II (14:00 W.S)',
            'type' => 'text',
            'tab' => 'Uji Peramatan'
        ]);  
        $this->crud->addField([
            'name' => 'ujiper_min_ii',
            'label' => 'Max II (14:00 W.S)',
            'type' => 'text',
            'tab' => 'Uji Peramatan'
        ]);  
//ADD COLUMN
        $this->crud->addColumn([
            'name' => 'tanggal',
            'label' => 'Tanggal',
        ]);
        //Temperatur
        $this->crud->addColumn([
            'name' => 'temp_bk_i',
            'label' => 'Bola Kering I',
        ]);
        $this->crud->addColumn([
            'name' => 'temp_bb_i',
            'label' => 'Bola Basah I',
        ]);
        $this->crud->addColumn([
            'name' => 'temp_bk_ii',
            'label' => 'Bola Kering II',
        ]);
        $this->crud->addColumn([
            'name' => 'temp_bb_ii',
            'label' => 'Bola Basah II',
        ]);
        $this->crud->addColumn([
            'name' => 'temp_bk_iii',
            'label' => 'Bola Kering III',
        ]);
        //BB
        $this->crud->addColumn([
            'name' => 'temp_bb_iii',
            'label' => 'Bola Basah III',
        ]);
        $this->crud->addColumn([
            'name' => 'temp_rumput_i',
            'label' => 'Rumput Min I',
        ]);
        $this->crud->addColumn([
            'name' => 'temp_rumput_ii',
            'label' => 'Min II',
        ]);
        $this->crud->addColumn([
            'name' => 'temp_rumput_iii',
            'label' => 'Max III',
        ]);
        //Lembap Nisbi
        $this->crud->addColumn([
            'name' => 'lembab_nisbi_i',
            'label' => 'Lembab Nisbi I (07:00 W.S)',
        ]);
        $this->crud->addColumn([
            'name' => 'lembab_nisbi_ii',
            'label' => 'Lembab Nisbi II (14:00 W.S)',
        ]);
        $this->crud->addColumn([
            'name' => 'lembab_nisbi_iii',
            'label' => 'Lembab Nisbi III (18:00 W.S)',
        ]);

        //Angin
        $this->crud->addColumn([
            'name' => 'angin_kec_rata_i',
            'label' => 'Kecepatan rata-rata I (07:00 W.S)',
        ]);
        $this->crud->addColumn([
            'name' => 'angin_kec_rata_ii',
            'label' => 'Kecepatan rata-rata II (14:00 W.S)',
            'type' => 'text',
            'tab' => 'Angin'
        ]);
        $this->crud->addColumn([
            'name' => 'angin_kec_rata_iii',
            'label' => 'Kecepatan rata-rata III (18:00 W.S)',
        ]);
        //Arah angin
        $this->crud->addColumn([
            'name' => 'angin_arah_i',
            'label' => 'Arah Angin I (07:00 W.S)',
        ]);
        $this->crud->addColumn([
            'name' => 'angin_arah_ii',
            'label' => 'Arah Angin II (14:00 W.S)',
        ]);
        $this->crud->addColumn([
            'name' => 'angin_arah_iii',
            'label' => 'Arah Angin III (18:00 W.S)',
        ]);

        // Kecepatan Angin 
        $this->crud->addColumn([
            'name' => 'angin_kec_i',
            'label' => 'Kecepatan Angin I (07:00 W.S)',
        ]);
        $this->crud->addColumn([
            'name' => 'angin_kec_ii',
            'label' => 'Kecepatan Angin II (14:00 W.S)',
        ]);
        $this->crud->addColumn([
            'name' => 'angin_kec_iii',
            'label' => 'Kecepatan Angin III (18:00 W.S)',
        ]);

        // Sinar Matahari
        $this->crud->addColumn([
            'name' => 'sinar_matahari',
            'label' => 'Sinar Matahari',
        ]);   
        //Hujan
        $this->crud->addColumn([
            'name' => 'hujan',
            'label' => 'Hujan',
        ]);    
        //Uji Peramatan
        $this->crud->addColumn([
            'name' => 'ujiper_bk_i',
            'label' => 'BK I (07:00 W.S)',
        ]);   
        $this->crud->addColumn([
            'name' => 'ujiper_min_i',
            'label' => 'MIN I (07:00 W.S)',
        ]);  
        $this->crud->addColumn([
            'name' => 'ujiper_bk_ii',
            'label' => 'BK II (14:00 W.S)',
        ]);  
        $this->crud->addColumn([
            'name' => 'ujiper_min_ii',
            'label' => 'Max II (14:00 W.S)',
        ]);  

        // add asterisk for fields that are required in Agm1aRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
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
