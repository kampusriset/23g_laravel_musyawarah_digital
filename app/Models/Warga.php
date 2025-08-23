<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Warga extends Authenticatable
{
    protected $table = 'warga';
    protected $primaryKey = 'id_warga';
    public $timestamps = true;

    protected $fillable = [
        'username','password','email','nama_lengkap','gender','phone','address',
        'role','is_active','remember_token','email_verified_at',
        'password_reset_token','password_reset_expires'
    ];

    protected $hidden = ['password','remember_token'];
}
