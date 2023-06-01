<?php

namespace App\Imports;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
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
        $date=Carbon::now();
        if(!empty($row[0])){
            return new HopDong([
                'HD_MaHD' =>$row[0],
                'ND_MaND' =>$row[1],
                'T_MaTram' =>$row[2],
                'DV_MaDV' =>$row[3],
                'HD_MaCSHT' =>$row[4],
                'T_TenTram' =>$row[5],
                'HD_NgayDangKy' =>$row[6],
                'HD_NgayHetHan' =>$row[7],
                'HD_NgayPhuLuc' =>$date,
                'HD_GiaGoc' =>$row[9],
                'HD_GiaHienTai' =>$row[10],
                'HD_SoTaiKhoan' =>$row[11],
                'HD_TenCTK' =>$row[12],
                'HD_TenNH' =>$row[13],
                'HD_TenChuDauTu' => $row[14],
                'HD_HDScan' => $row[15]
            ]);
        }
    }
}
