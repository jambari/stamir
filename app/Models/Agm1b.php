<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Agm1b extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'agm1bs';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['tanggal', 'gundul_i_5cm', 'gundul_i_10cm', 'gundul_i_20cm', 'gundul_ii_5cm', 'gundul_ii_10cm', 'gundul_ii_20cm',
        'gundul_iii_5cm', 'gundul_iii_10cm', 'gundul_iii_20cm', 'gundul_iii_50cm', 'gundul_iii_100cm',
        'berumput_i_5cm', 'berumput_i_10cm', 'berumput_i_20cm', 'berumput_ii_5cm', 'berumput_ii_10cm', 'berumput_ii_20cm',
        'berumput_iii_5cm', 'berumput_iii_10cm', 'berumput_iii_20cm', 'berumput_iii_50cm', 'berumput_iii_100cm', 
        'keterangan'
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
