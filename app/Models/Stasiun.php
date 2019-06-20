<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Stasiun extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'stasiuns';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['kode_stasiun','jenis_stasiun','nomor_stasiun','zom','nama_stasiun', 'provinsi', 'kabupaten', 'lintang', 'bujur'];
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

    public function hujans()
    {
        return $this->hasMany('App\Models\Hujan');  
    }
    public function alat()
    {
        return $this->hasMany('App\Models\Alat');    
    }
    public function bolakering()
    {
        return $this->hasMany('App\Models\Bolakring');
    }

    public function bolabasah()
    {
        return $this->hasMany('App\Models\Bolabasah');
    }
    public function dewpoint()
    {
        return $this->hasMany('App\Models\Dewpoint');
    }
    public function humidity()
    {
        return $this->hasMany('App\Models\Humidity');
    }
    public function rain()
    {
        return $this->hasMany('App\Models\Rain');
    }
}
