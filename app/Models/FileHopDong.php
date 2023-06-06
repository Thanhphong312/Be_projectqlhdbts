<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileHopDong extends Model
{
    use HasFactory;

    protected $table = 'file_hop_dong';

    protected $primarykey = 'F_MaFile';

    protected $fillable = [
        'F_MaFile',
        'HD_MaHD',
        'F_Loai',
        'F_NgayTao',
        'F_NgaySua'
    ];

    public $timestamps = true;

    public function hopdong()
    {
        return $this->hasOne(HopDong::class, 'HD_MaHD', 'HD_MaHD');
    }
}
