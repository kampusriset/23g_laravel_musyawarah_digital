<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Warga extends Authenticatable
{
    protected $fillable=['nama_lengkap','username','email','password'];
    protected $hidden=['password'];
}
