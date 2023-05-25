<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'nguoi_dung';

    protected $fillable = [
        'ND_MaND', 'ND_HoTen', 'ND_GioiTinh', 'ND_DiaChi', 'ND_Email', 'ND_MatKhau', 'ND_SDT', 'created_at', 'updated_at'
    ];
    public $timestamps = true;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function setPasswordAttribute($value)
    {
        $this->attributes['ND_MatKhau'] = bcrypt($value);
    }
}
