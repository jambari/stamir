<?php

namespace App\Imports;

use App\Models\Hujan;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class HujansImport implements ToModel
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
           'stasiun'    => $row[1], 
           'total' => $row[2]
        ]);
    }
}
