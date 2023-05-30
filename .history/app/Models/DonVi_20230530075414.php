<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonVi extends Model
{
    use HasFactory;
    protected $table = 'donvi';

    protected $primarykey = 'maDonVi';

    protected $fillable = [
        'DV_MaDV',
        'DV_TenDV',
        'created_at',
        'updated_at',
    ];
    public $timestamps = false;
    public function NguoiDungDonVi()
    {
        return $this->hasMany(NguoiDungDonVi::class, 'maDV');
    }
    public function HopDongs()
    {
        return $this->hasMany(HopDong::class, 'maDV');
    }
}
