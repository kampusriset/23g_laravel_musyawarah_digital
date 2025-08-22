<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Obrolan extends Model
{
    protected $fillable=['warga_id','message'];
    public function user(){ return $this->belongsTo(Warga::class,'warga_id'); }
    public function reactions(){ return $this->hasMany(ChatReaction::class); }
    public function attachments(){ return $this->hasMany(ChatAttachment::class); }
}
