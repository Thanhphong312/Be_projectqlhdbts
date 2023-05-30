<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiDungDonVi extends Model
{
    use HasFactory;
    protected $table = 'Nguoi_Dung_Don_Vi';

    protected $primarykey = 'id'; 

    protected $fillable = [
        'id',
        'DV_maDV',
        'ND_maND',
    ];
    public $timestamps = true;
    public function Users()
    {
        return $this->hasOne(User::class);
    }
    public function DonVi()
    {
        return $this->hasOne(DonVi::class);
    }
}

