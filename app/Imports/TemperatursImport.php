<?php

namespace App\Imports;

use App\Models\Temperatur;
use Maatwebsite\Excel\Concerns\ToModel;

class TemperatursImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Temperatur([
           'tanggal'     => $row[0],
           'bola_kering'    => $row[1], 
           'bola_basah' => $row[2],
           'rumput' => $row[3],
           'jam' => $row[4]
        ]);
    }
}
