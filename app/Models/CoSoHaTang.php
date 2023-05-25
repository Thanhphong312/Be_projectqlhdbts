<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoSoHaTang extends Model
{
    use HasFactory;

    protected $table = 'cosohatang';
    
    protected $primarykey = 'maCSHT'; 

    protected $fillable = [
        'maCSHT', 'tenCSHT',
    ];
    public $timestamps = false;

    public function trams()
    {
        return $this->hasMany(Tram::class, 'maCSHT');
    }
}
