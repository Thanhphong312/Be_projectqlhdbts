<?php

namespace App\Imports;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\HopDong;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HDImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $date=Carbon::now();
            return new HopDong([
                'HD_MaHD' =>$row["ma_hop_dong"],
                'ND_MaND' =>$row["ma_nguoi_dung"],
                'T_MaTram' =>$row["ma_tram"],
                'DV_MaDV' =>$row["ma_don_vi"],
                'HD_MaCSHT' =>$row["ma_csht"],
                'T_TenTram' =>$row["ten_tram"],
                'HD_NgayDangKy' =>$row["ngay_dang_ky"],
                'HD_NgayHetHan' =>$row["ngay_het_han"],
                'HD_NgayPhuLuc' =>$date,
                'HD_GiaGoc' =>$row["gia_goc"],
                'HD_GiaHienTai' =>$row["gia_hien_tai"],
                'HD_SoTaiKhoan' =>$row["so_tai_khoan"],
                'HD_TenCTK' =>$row["ten_chu_tai_khoan"],
                'HD_TenNH' =>$row["ten_ngan_hang"],
                'HD_TenChuDauTu' => $row["ten_chu_dau_tu"],
                'HD_HDScan' => $row["hop_dong"]
            ]);
    }
}
