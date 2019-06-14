<?php

namespace App\Imports;

use App\Models\Nisbi;
use Maatwebsite\Excel\Concerns\ToModel;

class NisbisImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Nisbi([
            'tanggal' => $row[0],
            'lembab_nisbi' => $row[1],
            'jam' => $row[2]
        ]);
    }
}
