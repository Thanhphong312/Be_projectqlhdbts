<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonGia extends Model
{
    use HasFactory;

    protected $table = 'don_gia';

    protected $primarykey = 'DG_MaDG';

    protected $fillable = [
        'DG_MaDG',
        'HD_MaHD',
        'DG_Thang',
        'DG_Nam',
        'DG_Gia'
    ];

    public $timestamps = false;

    public function hopdong()
    {
        return $this->hasOne(HopDong::class, 'HD_MaHD' ,'HD_MaHD');
    }
}
