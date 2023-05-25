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
        'maCSHT', 'tenCSHT',
    ];
    public $timestamps = false;
}
