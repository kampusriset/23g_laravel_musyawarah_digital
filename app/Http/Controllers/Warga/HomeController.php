<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('warga.home');
    }
}
