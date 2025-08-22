<?php
namespace App\Http\Controllers\Warga;
use App\Http\Controllers\Controller;
use App\Models\Notulen;

class NotulenController extends Controller
{
    public function index(){
        $notulen = Notulen::all();
        return view('warga.notulen',compact('notulen'));
    }
}
