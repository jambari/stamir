<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Models\Stasiun;
use App\Models\Alat;

class Bolakering extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'bolakerings';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['tanggal','bola_kering','jam', 'stasiun_id'];
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
    public function getStasiunIdAttribute ($value) {
        $id = $value;
        $stasiun = Stasiun::find($id);
        $value = $stasiun['nama_stasiun'];
        return ucwords($value);
   }

    public function getAlatIdAttribute ($value) {
        $id = $value;
        $stasiun = Alat::find($id);
        $value = $stasiun['nama'];
        return ucwords($value);
   }

   //jam
    public function getJamAttribute($value)
    {
        if ($value == '0') {
            return '00.00 W.S';
        }
        if ($value == '1') {
            return '01.00 W.S';
        }
        if ($value == '2') {
            return '02.00 W.S';
        }
        if ($value == '3') {
            return '03.00 W.S';
        }
        if ($value == '4') {
            return '04.00 W.S';
        }
        if ($value == '5') {
            return '05.00 W.S';
        }
        if ($value == '6') {
            return '06.00 W.S';
        }
        if ($value == '7') {
            return '07.00 W.S';
        }
        if ($value == '8') {
            return '08.00 W.S';
        }
        if ($value == '9') {
            return '09.00 W.S';
        }
        if ($value == '10') {
            return '10.00 W.S';
        }
        if ($value == '11') {
            return '11.00 W.S';
        }
        if ($value == '12') {
            return '12.00 W.S';
        }
        if ($value == '13') {
            return '13.00 W.S';
        }
        if ($value == '14') {
            return '14.00 W.S';
        }
        if ($value == '15') {
            return '15.00 W.S';
        }
        if ($value == '16') {
            return '16.00 W.S';
        }
        if ($value == '17') {
            return '17.00 W.S';
        }
        if ($value == '18') {
            return '18.00 W.S';
        }
        if ($value == '19') {
            return '19.00 W.S';
        }
        if ($value == '20') {
            return '20.00 W.S';
        }
        if ($value == '21') {
            return '21.00 W.S';
        }
        if ($value == '22') {
            return '22.00 W.S';
        }
        if ($value == '23') {
            return '23.00 W.S';
        }
    }
    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */
    public function stasiun()
    {
        return $this->belongsTo('App\Models\Stasiun');
    }

    public function alat()
    {
        return $this->belongsTo('App\Models\Alat');
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
