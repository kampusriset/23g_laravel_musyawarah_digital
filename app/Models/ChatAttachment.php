<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ChatAttachment extends Model{
    protected $fillable=['obrolan_id','file_path','file_type'];
}
