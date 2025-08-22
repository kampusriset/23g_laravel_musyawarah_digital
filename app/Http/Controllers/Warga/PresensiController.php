<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Presensi;

class PresensiController extends Controller
{
    public function index() {
        $presensis = Presensi::with('warga')->get();
        return view('warga.presensi',compact('presensis'));
    }
}
