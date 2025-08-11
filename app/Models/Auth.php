<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    protected $table = "warga";
    protected $primaryKey = "id_warga";
    protected $fillabel =[
        "username",
        "password",
        "email",
        "is_active",
        "nama_lengkap",
        "gender"
    ];
}
