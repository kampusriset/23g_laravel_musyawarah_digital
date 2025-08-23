<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obrolan extends Model
{
    protected $table = 'obrolan';
    protected $primaryKey = 'id_obrolan';
    public $timestamps = true;

    protected $fillable = [
        'warga_id','agenda_id','pesan','tipe_pesan','parent_id',
        'is_edited','edited_at','is_deleted','deleted_at',
        'file_path','file_name','file_size','mentioned_users'
    ];

    protected $casts = [
        'mentioned_users' => 'array',
        'is_edited' => 'boolean',
        'is_deleted' => 'boolean',
        'edited_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function warga(){ return $this->belongsTo(Warga::class,'warga_id','id_warga'); }
}
