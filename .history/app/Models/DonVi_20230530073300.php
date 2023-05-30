<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonVi extends Model
{
    use HasFactory;
    protected $table = 'donvi';

    protected $primarykey = 'maDonVi';

    protected $fillable = [
        'maDonVi',
        'tenDonVi',
    ];
    public $timestamps = false;
    public function NguoiDungDonVi()
    {
        return $this->hasMany(NguoiDungDonVi::class, 'maDV');
    }
}
