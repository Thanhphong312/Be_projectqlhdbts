<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tram extends Model
{
    use HasFactory;
    protected $table = 'tram';
    
    protected $primarykey = 'maTram'; 

    protected $fillable = [
        'maCSHT', 'tenTram', 'diaChi', 'tinhTrang'
    ];
    public $timestamps = false;
    public function hopdongs()
    {
        return $this->hasMany(HopDong::class, 'maTram');
    }
}
