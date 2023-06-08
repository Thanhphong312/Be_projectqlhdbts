<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonViQLTram extends Model
{
    use HasFactory;
    protected $table = 'dvql_tram';

    protected $primarykey = 'id'; 

    protected $fillable = [
        'id', 'Ten_DV', 'Ten_NgQL', 'created_at', 'updated_at'
    ];

    public $timestamps = true;

    public function trams()
    {
        return $this->hasMany(Tram::class, 'Ma_DVQL');
    }
}
