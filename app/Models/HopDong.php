<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HopDong extends Model
{
    use HasFactory;

    protected $table = 'hop_dong';

    protected $primarykey = 'HD_MaHD';

    protected $fillable = [
        'HD_MaHD',
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
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function dongias(){
        return $this->hasMany(DonGia::class, 'HD_MaHD', 'HD_MaHD');
    }

    public function filehopdongs(){
        return $this->hasMany(FileHopDong::class, 'HD_MaHD', 'HD_MaHD');
    }

    public function donvi(){
        return $this->hasOne(DonVi::class, 'DV_MaDV', 'DV_MaDV');
    }
    public function tram(){
        return $this->hasOne(Tram::class, 'T_MaTram', 'T_MaTram');
    }
    public function nguoidung()
    {
        return $this->hasOne(nguoidung::class, 'id', 'ND_MaND');
    }
}