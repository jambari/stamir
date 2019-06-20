<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Models\Stasiun;
class Alat extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'alats';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['stasiun_id' ,'tanggal', 'nama', 'tipe', 'merk', 'desa', 'kecamatan','instansi','alamat_instansi','lingkungan','orografi','kepemilikan','kondisi_alat',
    'pagar', 'aktifitas','sample_prakiraan', 'dipasang_oleh'];
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
    public function getStasiunIdAttribute ($value) {
        $id = $value;
        $stasiun = Stasiun::find($id);
        $value = $stasiun['nama_stasiun'];
        return ucwords($value);
   }
    public function calibrations()
    {
        return $this->hasMany('App\Models\Calibration');
    }

    public function bolakering()
    {
        return $this->hasMany('App\Models\Bolakering');
    }

    public function stasiun()
    {
        return $this->belongsTo('App\Models\Stasiun');
    }

    public function bolabasah()
    {
        return $this->hasMany('App\Models\Bolabasah');
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
