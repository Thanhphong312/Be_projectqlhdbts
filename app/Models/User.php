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

    protected $fillable = [
            'id',
            'ND_MaND',
            'ND_MaQ', 
            'ND_MaDV', 
            'name', 
            'ND_GioiTinh', 
            'ND_DiaChi', 
            'ND_SDT', 
            'email', 
            'email_verified_at', 
            'password', 
            'remember_token',
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
}
