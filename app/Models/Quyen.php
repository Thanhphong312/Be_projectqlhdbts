<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quyen extends Model
{
    use HasFactory;

    protected $table = 'quyen';
    
    protected $primarykey = 'maQ'; 

    protected $fillable = [
        'maQ', 'tenQ',
    ];
    public $timestamps = false;

    public function quyennguoidungs()
    {
        return $this->hasMany(QuyenNguoiDung::class, 'maQ');
    }
}
