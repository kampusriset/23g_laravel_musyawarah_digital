<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notulen extends Model
{
    protected $table = 'notulen';
    protected $primaryKey = 'id_notulen';
    public $timestamps = true;

    protected $fillable = [
        'judul_musyawarah','total_hadir','total_undangan',
        'catatan','hasil_keputusan','status','admin_id'
    ];
}
