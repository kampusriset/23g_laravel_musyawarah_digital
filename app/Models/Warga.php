<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Warga extends Authenticatable
{
    use Notifiable;

    protected $table = 'warga'; // <-- Tambahkan ini
    protected $primaryKey = 'id_warga';
    protected $fillable = [
        'username', 'password', 'email', 'nama_lengkap', 
        'gender', 'phone', 'address', 'role', 'is_active'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
