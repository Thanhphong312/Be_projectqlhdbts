<?php

namespace App\Imports;

use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\HopDong;
use App\Models\User;
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
            $user=auth()->user()->id;
            if ($hopdong != null) {
                // dd($hopdong);
                $newhopdong['T_MaTram'] = $row["ma_tram"];
                $newhopdong['DV_MaDV'] = $row["ma_don_vi"];
                $newhopdong['HD_MaCSHT'] = $row["ma_csht"];
                $newhopdong['T_TenTram'] = $row["ten_tram"];
                $newhopdong['HD_NgayDangKy'] = Carbon::createFromFormat('d/m/Y',$row["ngay_dang_ky"])->toDateTimeString();
                $newhopdong['HD_NgayHetHan'] = Carbon::createFromFormat('d/m/Y',$row["ngay_het_han"])->toDateTimeString();
                $newhopdong['HD_NgayPhuLuc'] = Carbon::now();
                $newhopdong['HD_GiaGoc'] = $row["gia_goc"];
                $newhopdong['HD_GiaHienTai'] = $row["gia_hien_tai"];
                $newhopdong['HD_SoTaiKhoan'] = $row["so_tai_khoan"];
                $newhopdong['HD_TenCTK'] = $row["ten_chu_tai_khoan"];
                $newhopdong['HD_TenNH'] = $row["ten_ngan_hang"];
                $newhopdong['HD_TenChuDauTu'] =  $row["ten_chu_dau_tu"];
                $newhopdong['HD_HDScan'] = str_replace('/file/d/', '/uc?export=download&id=', $row["hop_dong"]);
                $newhopdong['HD_HDScan'] = str_replace('/view?usp=sharing', '',  $newhopdong['HD_HDScan']);
                $newhopdong['HD_TT'] = 1;
                HopDong::where('HD_MaHD', $row['ma_hop_dong'])->update($newhopdong);
            } else {
                $hopdong = new HopDong;
                $hopdong->HD_MaHD = $row["ma_hop_dong"];
                $hopdong->ND_MaND = $user;
                $hopdong->T_MaTram = $row["ma_tram"];
                $hopdong->DV_MaDV = $row["ma_don_vi"];
                $hopdong->HD_MaCSHT = $row["ma_csht"];
                $hopdong->T_TenTram = $row["ten_tram"];
                $hopdong->HD_NgayDangKy = Carbon::createFromFormat('d/m/Y',$row["ngay_dang_ky"])->toDateTimeString();
                $hopdong->HD_NgayHetHan = Carbon::createFromFormat('d/m/Y',$row["ngay_het_han"])->toDateTimeString();
                $hopdong->HD_NgayPhuLuc = Carbon::now();
                $hopdong->HD_GiaGoc = $row["gia_goc"];
                $hopdong->HD_GiaHienTai = $row["gia_hien_tai"];
                $hopdong->HD_SoTaiKhoan = $row["so_tai_khoan"];
                $hopdong->HD_TenCTK = $row["ten_chu_tai_khoan"];
                $hopdong->HD_TenNH = $row["ten_ngan_hang"];
                $hopdong->HD_TenChuDauTu =  $row["ten_chu_dau_tu"];
                $hopdong->HD_HDScan = str_replace('/file/d/', '/uc?export=download&id=',  $row["hop_dong"]);
                $hopdong->HD_HDScan = str_replace('/view?usp=sharing', '',$hopdong->HD_HDScan);
                $hopdong->HD_TT = 1;
                $hopdong->save();
            }
        }
    }
    public function headingRow(): int
    {
        return 2;
    }

}
