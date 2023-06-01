<?php

namespace App\Imports;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\HopDong;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class HDImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     $date=Carbon::now();
    //         return new HopDong([
    //             'HD_MaHD' =>$row["ma_hop_dong"],
    //             'ND_MaND' =>$row["ma_nguoi_dung"],
    //             'T_MaTram' =>$row["ma_tram"],
    //             'DV_MaDV' =>$row["ma_don_vi"],
    //             'HD_MaCSHT' =>$row["ma_csht"],
    //             'T_TenTram' =>$row["ten_tram"],
    //             'HD_NgayDangKy' =>$row["ngay_dang_ky"],
    //             'HD_NgayHetHan' =>$row["ngay_het_han"],
    //             'HD_NgayPhuLuc' =>$date,
    //             'HD_GiaGoc' =>$row["gia_goc"],
    //             'HD_GiaHienTai' =>$row["gia_hien_tai"],
    //             'HD_SoTaiKhoan' =>$row["so_tai_khoan"],
    //             'HD_TenCTK' =>$row["ten_chu_tai_khoan"],
    //             'HD_TenNH' =>$row["ten_ngan_hang"],
    //             'HD_TenChuDauTu' => $row["ten_chu_dau_tu"],
    //             'HD_HDScan' => $row["hop_dong"]
    //         ]);
    // }
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            // dd($row['ma_hop_dong']);
           $hopdong = HopDong::where('HD_MaHD',$row['ma_hop_dong'])->first();
        //    dd($hopdong);
           if(isset($hopdong)){
                        $date=Carbon::now();
                        $newhopdong = [];
                        $newhopdong['ND_MaND'] = $row["ma_nguoi_dung"];
                        $newhopdong['T_MaTram'] = $row["ma_tram"];
                        $newhopdong['DV_MaDV'] = $row["ma_don_vi"];
                        $newhopdong['HD_MaCSHT'] = $row["ma_csht"];
                        $newhopdong['T_TenTram'] = $row["ten_tram"];
                        $newhopdong['HD_NgayDangKy'] = $row["ngay_dang_ky"];
                        $newhopdong ['HD_NgayHetHan'] = $row["ngay_het_han"];
                        $newhopdong['HD_NgayPhuLuc'] = $date;
                        $newhopdong['HD_GiaGoc'] = $row["gia_goc"];
                        $newhopdong['HD_GiaHienTai'] = $row["gia_hien_tai"];
                        $newhopdong['HD_SoTaiKhoan'] = $row["so_tai_khoan"];
                        $newhopdong['HD_TenCTK'] = $row["ten_chu_tai_khoan"];
                        $newhopdong['HD_TenNH'] = $row["ten_ngan_hang"];
                        $newhopdong['HD_TenChuDauTu'] =  $row["ten_chu_dau_tu"];
                        $newhopdong['HD_HDScan'] =  $row["hop_dong"];
                        // dd($newhopdong);
                        $hopdong->whereNotNull('HD_MaHD')->update($newhopdong);
                        
           }else{
            dd();
            $date=Carbon::now();
            $hopdong = new HopDong;
            $hopdong -> HD_MaHD = $row["ma_hop_dong"];
            $hopdong -> ND_MaND = $row["ma_nguoi_dung"];
            $hopdong -> T_MaTram = $row["ma_tram"];
            $hopdong -> DV_MaDV = $row["ma_don_vi"];
            $hopdong -> HD_MaCSHT = $row["ma_csht"];
            $hopdong -> T_TenTram = $row["ten_tram"];
            $hopdong -> HD_NgayDangKy = $row["ngay_dang_ky"];
            $hopdong -> HD_NgayHetHan = $row["ngay_het_han"];
            $hopdong -> HD_NgayPhuLuc = $date;
            $hopdong -> HD_GiaGoc = $row["gia_goc"];
            $hopdong -> HD_GiaHienTai = $row["gia_hien_tai"];
            $hopdong -> HD_SoTaiKhoan = $row["so_tai_khoan"];
            $hopdong -> HD_TenCTK = $row["ten_chu_tai_khoan"];
            $hopdong -> HD_TenNH = $row["ten_ngan_hang"];
            $hopdong -> HD_TenChuDauTu =  $row["ten_chu_dau_tu"];
            $hopdong -> HD_HDScan =  $row["hop_dong"];
            $hopdong->whereNull('HD_MaHD')->save();
           }
        }
    }
}
