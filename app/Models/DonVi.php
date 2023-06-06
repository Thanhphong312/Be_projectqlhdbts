<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonVi extends Model
{
    use HasFactory;

    protected $table = 'don_vi';

    protected $primarykey = 'DV_MaDV';

    protected $fillable = [
        'DV_MaDV',
        'DV_TenDV',
    ];

    public $timestamps = true;

    public function hopdongs()
    {
        return $this->hasMany(HopDong::class, 'DV_MaDV', 'DV_MaDV');
    }

    public function nguoidungdonvis()
    {
        return $this->hasMany(NguoiDungDonVi::class, 'DV_MaDV', 'DV_MaDV');
    }
}
