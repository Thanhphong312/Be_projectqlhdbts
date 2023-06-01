<?php

namespace App\Exports;

use App\Models\HopDong;
use Maatwebsite\Excel\Concerns\FromCollection;

class HDExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return HopDong::all();
    }
}
