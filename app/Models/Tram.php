<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tram extends Model
{
    use HasFactory;
    
    protected $table = 'tram';

    protected $primarykey = 'T_MaTram';

    protected $fillable = [
        'T_MaTram',
        'CSHT_MaCSHT',
        'T_TenTram',
        'T_DiaChiTram',
        'T_TinhTrang'
    ];
    
    public $timestamps = true;

    public function hopdongs()
    {
        return $this->hasMany(HopDong::class, 'T_MaTram', 'T_MaTram');
    }

    public function cosohatang()
    {
        return $this->hasOne(CoSoHaTang::class, 'CSHT_MaCSHT', 'CSHT_MaCSHT');
    }
}
