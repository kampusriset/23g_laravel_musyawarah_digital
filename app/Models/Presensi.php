<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $table = 'presensi';
    protected $primaryKey = 'id_presensi';
    public $timestamps = true;

    protected $fillable = ['agenda_id','warga_id','waktu_hadir','metode_presensi'];
    protected $casts = ['waktu_hadir'=>'datetime'];
}
