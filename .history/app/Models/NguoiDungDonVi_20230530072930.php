<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiDungDonVi extends Model
{
    use HasFactory;
    public function Users()
    {
        return $this->hasOne(User::class);
    }
    public function DonVi()
    {
        return $this->hasOne(DonVi::class);
    }
}

