<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $fillable = ['agenda_id','warga_id','waktu_hadir','metode_presensi'];
    public function warga() { return $this->belongsTo(Warga::class,'warga_id'); }
}
