<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HopDong extends Model
{
    use HasFactory;

    protected $table = 'hopdong';

    protected $primarykey = 'HD_MaHD';

    protected $fillable = [
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
        'HD_HDScan'
    ];

    public $timestamps = false;

    public function dongias(){
        return $this->hasMany(DonGia::class, 'HD_MaHD', 'HD_MaHD');
    }

    public function filehopdongs(){
        return $this->hasMany(FileHopDong::class, 'HD_MaHD', 'HD_MaHD');
    }

    public function donvi(){
        return $this->hasOne(DonVi::class, 'DV_MaDV', 'DV_MaDV');
    }
}
