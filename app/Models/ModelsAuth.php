<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ModelsAuth extends Authenticatable
{
    use Notifiable;
    protected $table = "warga";
    protected $primaryKey = "id_warga";
    protected $fillable =[
        "nama_lengkap",
        "username",
        "password",
        "email",
        "role",
        "is_active",
        "gender"
    ];
}
