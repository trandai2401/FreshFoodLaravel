<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function role()
    {
        return $this->belongsTo(role::class, 'id_role', 'id');
    }
    public function giohang()
    {
        return $this->hasMany(giohang::class, 'id_user', 'id');
    }

    public function hoaDon()
    {
        return $this->hasMany(hoadon::class, 'id_user', 'id');
    }
    public function xaPhuong()
    {
        return $this->belongsTo(XaPhuong::class, 'xaphuong_id', 'id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'tendangnhap',
        'name',
        'email',
        'id_role',
        'password', 'google_id'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
