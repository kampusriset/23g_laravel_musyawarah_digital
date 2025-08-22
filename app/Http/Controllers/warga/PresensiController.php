<?php
namespace App\Http\Controllers\Warga;
use App\Http\Controllers\Controller;
use App\Models\Presensi;

class PresensiController extends Controller
{
    public function index(){
        $presensi = Presensi::all();
        return view('warga.presensi',compact('presensi'));
    }
}
