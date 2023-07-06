<?php

namespace App\Exports;

use App\Models\HopDong;
use App\Models\PhuLuc;
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

class BaoCaoExport implements FromView, ShouldAutoSize, WithDefaultStyles, WithStyles, WithEvents
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function view(): View
    {
        $hd = [];
        // dd($this->request->HD);
        if ($this->request->has('HD')) {
            foreach ($this->request->HD as $key => $value) {
                if ($this->request->type[$key] == 'hop_dong') {
                    $HopDong = HopDong::select(
                        'HD_MaHD',
                        'ND_MaND',
                        'T_MaTram',
                        'DV_MaDV',
                        'HD_MaCSHT',
                        'T_TenTram',
                        'HD_NgayDangKy',
                        'HD_NgayHetHan',
                        'HD_NgayPhuLuc',
                        'HD_GiaGoc',
                        'HD_GiaHienTai',
                        'HD_SoTaiKhoan',
                        'HD_TenCTK',
                        'HD_TenNH',
                        'HD_TenChuDauTu',
                        'HD_HDScan',
                    )->where('HD_MaHD',$value)->orderByRaw("CAST(SUBSTR(HD_MaHD, 3) AS UNSIGNED)")->first();
                } else {
                    $HopDong = PhuLuc::select(
                        'HD_MaHD',
                        'ND_MaND',
                        'T_MaTram',
                        'DV_MaDV',
                        'HD_MaCSHT',
                        'T_TenTram',
                        'HD_NgayDangKy',
                        'HD_NgayHetHan',
                        'HD_NgayPhuLuc',
                        'HD_GiaGoc',
                        'HD_GiaHienTai',
                        'HD_SoTaiKhoan',
                        'HD_TenCTK',
                        'HD_TenNH',
                        'HD_TenChuDauTu',
                        'HD_HDScan',
                    )->where('HD_MaHD',$value)->orderByRaw("CAST(SUBSTR(HD_MaHD, 3) AS UNSIGNED)")->first();
                }
                array_push($hd, $HopDong);
            }
        }
        // dd($hd);
        return view('BaoCaoExport', [
            'HopDong' => $hd
        ]);
    }

    public function defaultStyles(Style $defaultStyle)
    {
        return [
            'font' => [
                'name' => 'Time New Roman',
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

        $sheet->getStyle('A2:' . $sheet->getHighestColumn() . $sheet->getHighestRow())
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle('A2:' . $sheet->getHighestColumn() . $sheet->getHighestRow())
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

        $sheet->getStyle('F2:' . $sheet->getHighestColumn() . $sheet->getHighestRow())
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

        $sheet->getStyle('G2:' . $sheet->getHighestColumn() . $sheet->getHighestRow())
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

        $sheet->getStyle('H2:' . $sheet->getHighestColumn() . $sheet->getHighestRow())
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

        $sheet->getStyle('I2:' . $sheet->getHighestColumn() . $sheet->getHighestRow())
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

        $sheet->getStyle('J2:' . $sheet->getHighestColumn() . $sheet->getHighestRow())
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

        $sheet->getStyle('K2:' . $sheet->getHighestColumn() . $sheet->getHighestRow())
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

        $sheet->getStyle('L2:' . $sheet->getHighestColumn() . $sheet->getHighestRow())
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

        $sheet->getStyle('M2:' . $sheet->getHighestColumn() . $sheet->getHighestRow())
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

        $sheet->getStyle('N2:' . $sheet->getHighestColumn() . $sheet->getHighestRow())
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('O2:' . $sheet->getHighestColumn() . $sheet->getHighestRow())
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('P2:' . $sheet->getHighestColumn() . $sheet->getHighestRow())
            ->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        return $sheet;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->mergeCells('A1:P1');

                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(40);

                $event->sheet->getDelegate()->getStyle('A1')
                    ->getFont()->setName('Time New Roman')
                    ->setBold(true)
                    ->setSize(20)
                    ->getColor()->setARGB('E31616');


                $cellRange = 'A2:P2';
                $event->sheet->getDelegate()->getStyle($cellRange)
                    ->getFont()->setName('Time New Roman')
                    ->setBold(true)
                    ->setSize(14);

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
