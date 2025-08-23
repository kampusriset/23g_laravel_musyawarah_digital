<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsulanKegiatan extends Model
{
    protected $table = 'usulan_kegiatan';
    protected $primaryKey = 'id_usulan';
    public $timestamps = true;

    protected $fillable = [
        'warga_id','agenda_id','judul_usulan','deskripsi','anggaran_estimasi','status_usulan'
    ];

    public function votes(){ return $this->hasMany(Voting::class,'usulan_id','id_usulan'); }
}
