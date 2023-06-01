<?php

namespace App\Imports;

use App\Models\HopDong;
use Maatwebsite\Excel\Concerns\ToModel;

class HDImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new HopDong([
            //
        ]);
    }
}
