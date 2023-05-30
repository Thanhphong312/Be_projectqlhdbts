<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoSoHaTang extends Model
{
    use HasFactory;

    protected $table = 'co_so_ha_tang';
    
    protected $primarykey = 'CSHT_MaCSHT'; 

    protected $fillable = [
        'CSHT_MaCSHT',
        'CSHT_TenCSHT'
    ];
    
    public $timestamps = false;

    public function trams()
    {
        return $this->hasMany(Tram::class, 'CSHT_MaCSHT');
    }
}
