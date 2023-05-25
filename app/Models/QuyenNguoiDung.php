<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuyenNguoiDung extends Model
{
    use HasFactory;
    protected $table = 'quyen_nguoi_dung';

    protected $primarykey = 'id'; 

    protected $fillable = [
        'id',
        'Q_MaQ',
        'ND_MaND',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;

    public function nguoidung(){
        return $this->hasOne(HopDong::class);
    }
    
}
