<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $warga = auth()->user(); // ambil data user yg login
        return view('warga.home', compact('warga'));
    }

    // Halaman untuk guest
    public function guestHome()
    {
        return view('guest.home');
    }

    public function about()
    {
        return view('guest.about');
    }

    public function contact()
    {
        return view('guest.contact');
    }
}
