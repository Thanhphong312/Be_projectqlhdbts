<?php

namespace App\Exports;

use App\Models\HopDong;
use DateTime;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Request;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use PhpOffice\PhpSpreadsheet\Style\Style;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;

class HDExport implements FromView, ShouldAutoSize, WithDefaultStyles, WithStyles, WithEvents
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

    public function defaultStyles(Style $defaultStyle)
    {
        return [
            'font' => [
                'name' => 'TimeNewRoman',
                'size' => 12
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ]

        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A2:' . $sheet->getHighestColumn() . $sheet->getHighestRow())
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        return $sheet;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->mergeCells('A1:O1');

                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(40);

                $event->sheet->getDelegate()->getStyle('A1')
                    ->getFont()
                    ->setName('TimeNewRoman')
                    ->setSize(20)
                    ->setBold(true)
                    ->getColor()
                    ->setARGB('e31616');


                $cellRange = 'A2:O2';
                $event->sheet->getDelegate()->getStyle($cellRange)
                    ->getFont()
                    ->setName('TimeNewRoman')
                    ->setSize(14)
                    ->setBold(true);

                $event->sheet->getDelegate()->getStyle($cellRange)
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFA0A0A0');

                $event->sheet->getDelegate()->getStyle($cellRange)
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }
}
