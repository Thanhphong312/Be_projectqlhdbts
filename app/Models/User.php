<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $primarykey = 'id'; 

    protected $fillable = [
        'maDV', 'hoTen', 'gioiTinh', 'diaChi', 'email','password', 'sdt', 
    ];
    public $timestamps = true;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function nguoidungs()
    {
        return $this->hasMany(QuyenNguoiDung::class, 'maND');
    }
}
