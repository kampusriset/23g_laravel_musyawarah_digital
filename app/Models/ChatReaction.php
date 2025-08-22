<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ChatReaction extends Model{
    protected $fillable=['obrolan_id','warga_id','emoji'];
}
