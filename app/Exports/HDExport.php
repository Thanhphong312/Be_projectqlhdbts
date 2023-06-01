<?php

namespace App\Exports;

use App\Models\HopDong;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
class HDExport implements FromView
{
    public function view(): View
    {
        $HopDong = HopDong::get();
        return view('HDexport', [
            'HopDong' => $HopDong
        ]);
    }
}
