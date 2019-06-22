<?php

namespace App\Imports;

use App\Models\Rain;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class RainsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)

    {

        // $rules = array(
        //   'hujan' => 'required'|'mimes:xls,xlsx,ods,ots,csv'
        // );

        return new Hujan([
           'tanggal'     => $row[0],
           'rain'    => $row[1],
           'stasiun_id' => $row[2]
        ]);
    }
}
