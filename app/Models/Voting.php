<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Voting extends Model{
    protected $table = 'voting';
    protected $fillable=['judul','options','deadline','results'];
}
