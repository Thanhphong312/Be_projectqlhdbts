<?php

namespace App\Exports;

use App\Models\HopDong;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Request;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class HDExport implements FromView, ShouldAutoSize, WithStyles
{
    protected $request;
    public function __construct($request)
    {
        $this->request = $request;
    }

    public function view(): View
    {
        $hd = [];
        if ($this->request->has('exportall')) {
            $HopDong = HopDong::get();
        } else {
            foreach ($this->request->DH as $value) {
                array_push($hd, $value);
            }
            $HopDong = HopDong::wherein('HD_MaHD', $hd)->get();
        }

        return view('HDexport', [
            'HopDong' => $HopDong
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(20);

        $sheet->mergeCells('A1:O1');
        return [
            2    => ['font' => ['bold' => true]],
        ];
    }
}
