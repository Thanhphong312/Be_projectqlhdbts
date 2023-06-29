<?php

namespace App\Imports;

use App\Models\PhuLuc;
use App\Models\Tram;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\HopDong;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;
use Session;
class HDImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public $result = true;
    public $message;

    public $dong = 0;
    public function collection(Collection $rows)
    {
        DB::beginTransaction();
        try{

            foreach ($rows as $key => $row) {
                $tram = Tram::where('T_MaTram', $row["ma_tram"])->first();
                $hopdong = HopDong::where('HD_MaHD', $row["ma_hop_dong"])->first();
                $newhopdong = [];
                $user = auth()->user()->id;
                if(!isset($row["ma_hop_dong"])){
                    DB::rollBack();
                    $this->result = false;
                    $this->dong =$key+3;
                    return ;
                }

                if ($hopdong != null) {
                    $newhopdong['ND_MaND'] = $user;
                    $newhopdong['T_MaTram'] = $row["ma_tram"];
                    $newhopdong['DV_MaDV'] = $row["ma_don_vi"];
                    $newhopdong['HD_MaCSHT'] = $row["ma_csht"];
                    $newhopdong['T_TenTram'] = $row["ten_tram"];
                    $newhopdong['HD_NgayDangKy'] = Carbon::createFromFormat('d/m/Y', $row["ngay_dang_ky"])->toDateString();
                    $newhopdong['HD_NgayHetHan'] = Carbon::createFromFormat('d/m/Y', $row["ngay_het_han"])->toDateString();
                    $newhopdong['HD_NgayPhuLuc'] = Carbon::now()->toDateString();
                    $newhopdong['HD_GiaGoc'] = $row["gia_goc"];
                    $newhopdong['HD_GiaHienTai'] = $row["gia_hien_tai"];
                    $newhopdong['HD_SoTaiKhoan'] = $row["so_tai_khoan"];
                    $newhopdong['HD_TenCTK'] = $row["ten_chu_tai_khoan"];
                    $newhopdong['HD_TenNH'] = $row["ten_ngan_hang"];
                    $newhopdong['HD_TenChuDauTu'] =  $row["ten_chu_dau_tu"];
                    $newhopdong['HD_HDScan'] = str_replace('/file/d/', '/uc?export=download&id=', $row["hop_dong"]);
                    $newhopdong['HD_HDScan'] = str_replace('/view?usp=sharing', '',  $newhopdong['HD_HDScan']);
                    $oldhopdong = $hopdong->toArray();
                    $result = array_diff_assoc($newhopdong, $oldhopdong);
                    // dd($result);
                    $noidung = "Nội dung sửa đổi : ";
                    foreach ($result as $key => $value) {
                        $noidung .= $key . (($value!=end($result))?",":"");
                    }
                    $oldhopdong['noidung'] = $noidung;
                    $this->newPhuluc($oldhopdong);
                    HopDong::where('HD_MaHD', $row['ma_hop_dong'])->update($newhopdong);
                } else {
                    if ($tram->T_TinhTrang == 0) {
                        
                        // cho phép import hợp đồng mới
                        $hopdong = new HopDong;
                        $hopdong->HD_MaHD = $row["ma_hop_dong"];
                        $hopdong->ND_MaND = $user;
                        $hopdong->T_MaTram = $row["ma_tram"];
                        $hopdong->DV_MaDV = $row["ma_don_vi"];
                        $hopdong->HD_MaCSHT = $row["ma_csht"];
                        $hopdong->T_TenTram = $row["ten_tram"];
                        $hopdong->HD_NgayDangKy = Carbon::createFromFormat('d/m/Y', $row["ngay_dang_ky"])->toDateString();
                        $hopdong->HD_NgayHetHan = Carbon::createFromFormat('d/m/Y', $row["ngay_het_han"])->toDateString();
                        $hopdong->HD_NgayPhuLuc = Carbon::now()->toDateString();
                        $hopdong->HD_GiaGoc = $row["gia_goc"];
                        $hopdong->HD_GiaHienTai = $row["gia_hien_tai"];
                        $hopdong->HD_SoTaiKhoan = $row["so_tai_khoan"];
                        $hopdong->HD_TenCTK = $row["ten_chu_tai_khoan"];
                        $hopdong->HD_TenNH = $row["ten_ngan_hang"];
                        $hopdong->HD_TenChuDauTu =  $row["ten_chu_dau_tu"];
                        $hopdong->HD_HDScan = str_replace('/file/d/', '/uc?export=download&id=',  $row["hop_dong"]);
                        $hopdong->HD_HDScan = str_replace('/view?usp=sharing', '', $hopdong->HD_HDScan);
                        // cập nhật tình trạng của trạm
                        Tram::where('T_MaTram', $row["ma_tram"])->update([
                            'T_TinhTrang'=> 1
                        ]);

                        $hopdong->save();
                    }else {
                        // không cho phép import hợp đồng mới
                        // kết thúc quá trình import và thông báo trạm đã được thuê
                        DB::rollBack();
                    $this->result = false;
                    $this->message = "Trạm đã được thuê";
                    $this->dong =$key+3;
                    return ;
                    }
                }
            }
            DB::commit();
            // $result = true;
        }catch(\Exception $e){
            DB::rollBack();
            $this->result = false;
            $this->dong +=3;
            // Session::flash('error', $e->getMessage());
        }

    }
    public function headingRow(): int
    {
        return 2;
    }
    public function newPhuluc($oldhopdong)
    {
        $phuluc = new PhuLuc();
        $phuluc->HD_MaHD = $oldhopdong["HD_MaHD"];
        $phuluc->ND_MaND = $oldhopdong["ND_MaND"];
        $phuluc->T_MaTram = $oldhopdong["T_MaTram"];
        $phuluc->DV_MaDV = $oldhopdong["DV_MaDV"];
        $phuluc->HD_MaCSHT = $oldhopdong["HD_MaCSHT"];
        $phuluc->T_TenTram = $oldhopdong["T_TenTram"];
        $phuluc->HD_NgayDangKy = $oldhopdong["HD_NgayDangKy"];
        $phuluc->HD_NgayHetHan = $oldhopdong["HD_NgayHetHan"];
        $phuluc->HD_NgayPhuLuc = $oldhopdong["HD_NgayPhuLuc"];
        $phuluc->HD_GiaGoc = $oldhopdong["HD_GiaGoc"];
        $phuluc->HD_GiaHienTai = $oldhopdong["HD_GiaHienTai"];
        $phuluc->HD_SoTaiKhoan = $oldhopdong["HD_SoTaiKhoan"];
        $phuluc->HD_TenCTK = $oldhopdong["HD_TenCTK"];
        $phuluc->HD_TenNH = $oldhopdong["HD_TenNH"];
        $phuluc->HD_TenChuDauTu =  $oldhopdong["HD_TenChuDauTu"];
        $phuluc->HD_HDScan = $oldhopdong["HD_HDScan"];
        $phuluc->noidung = $oldhopdong["noidung"];
        $phuluc->save();
    }
}
