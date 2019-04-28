<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Agm1a extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'agm1as';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['tanggal', 'temp_bk_i', 'temp_bb_i', 'temp_rumput_i', 'lembab_nisbi_i',
            'angin_kec_rata_i', 'angin_arah_i', 'angin_kec_i', 'temp_bk_ii', 'temp_bb_ii', 'temp_rumput_ii', 
            'lembab_nisbi_ii', 'angin_kec_rata_ii', 'angin_arah_ii', 'angin_kec_ii', 'temp_bk_iii', 'temp_bb_iii', 
            'temp_rumput_iii', 'lembab_nisbi_iii', 'angin_kec_rata_iii', 'angin_arah_iii', 'angin_kec_iii',
            'sinar_matahari', 'hujan', 'ujiper_bk_i', 'ujiper_min_i', 'ujiper_bk_ii', 'ujiper_max_ii', 
    ];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
