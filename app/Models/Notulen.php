<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Notulen extends Model{
    protected $table = 'notulen';
    protected $fillable=['judul','content','status'];
}
