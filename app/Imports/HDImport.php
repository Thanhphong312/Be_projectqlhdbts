<?php

namespace App\Imports;

use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\HopDong;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Log;
use Maatwebsite\Excel\Concerns\ToCollection;

class HDImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function collection(Collection $rows)
    {
        // dd();
        // dd($rows);
        
        foreach ($rows as $row) {
            $hopdong = HopDong::where('HD_MaHD', $row['ma_hop_dong'])->first();

            $newhopdong = [];
            if (isset($hopdong)) {               
                $newhopdong['T_MaTram'] = $row["ma_tram"];
                $newhopdong['DV_MaDV'] = $row["ma_don_vi"];
                $newhopdong['HD_MaCSHT'] = $row["ma_csht"];
                $newhopdong['T_TenTram'] = $row["ten_tram"];
                $newhopdong['HD_NgayDangKy'] = $row["ngay_dang_ky"];
                $newhopdong['HD_NgayHetHan'] = $row["ngay_het_han"];
                $newhopdong['HD_NgayPhuLuc'] = Carbon::now();
                $newhopdong['HD_GiaGoc'] = $row["gia_goc"];
                $newhopdong['HD_GiaHienTai'] = $row["gia_hien_tai"];
                $newhopdong['HD_SoTaiKhoan'] = $row["so_tai_khoan"];
                $newhopdong['HD_TenCTK'] = $row["ten_chu_tai_khoan"];
                $newhopdong['HD_TenNH'] = $row["ten_ngan_hang"];
                $newhopdong['HD_TenChuDauTu'] =  $row["ten_chu_dau_tu"];
                $newhopdong['HD_HDScan'] =  $row["hop_dong"];
                // dd($newhopdong);
                // dd('a');
                Log::info($hopdong->HD_MaHD);

                HopDong::where('HD_MaHD', $row['ma_hop_dong'])->update($newhopdong);
            } else {
                $hopdong = new HopDong;
                $hopdong->HD_MaHD = $row["ma_hop_dong"];
                $hopdong->ND_MaND = $row["ma_nguoi_dung"];
                $hopdong->T_MaTram = $row["ma_tram"];
                $hopdong->DV_MaDV = $row["ma_don_vi"];
                $hopdong->HD_MaCSHT = $row["ma_csht"];
                $hopdong->T_TenTram = $row["ten_tram"];
                $hopdong->HD_NgayDangKy = $row["ngay_dang_ky"];
                $hopdong->HD_NgayHetHan = $row["ngay_het_han"];
                $hopdong->HD_NgayPhuLuc = Carbon::now();
                $hopdong->HD_GiaGoc = $row["gia_goc"];
                $hopdong->HD_GiaHienTai = $row["gia_hien_tai"];
                $hopdong->HD_SoTaiKhoan = $row["so_tai_khoan"];
                $hopdong->HD_TenCTK = $row["ten_chu_tai_khoan"];
                $hopdong->HD_TenNH = $row["ten_ngan_hang"];
                $hopdong->HD_TenChuDauTu =  $row["ten_chu_dau_tu"];
                $hopdong->HD_HDScan =  $row["hop_dong"];
                // dd($hopdong);

                $hopdong->save();
            }
        }
    }
}
