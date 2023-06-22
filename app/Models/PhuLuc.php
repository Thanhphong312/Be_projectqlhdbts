<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhuLuc extends Model
{
    use HasFactory;

    protected $table = 'phu_luc';

    protected $primarykey = 'id';

    protected $fillable = [
        'id',
        'HD_MaHD',
        'ND_MaND',
        'noidung',
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
        'HD_TT',
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function hopdong()
    {
        return $this->hasOne(HopDong::class, 'HD_MaHD' ,'HD_MaHD');
    }
}
