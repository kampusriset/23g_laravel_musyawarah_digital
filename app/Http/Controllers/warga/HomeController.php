<?php
namespace App\Http\Controllers\Warga;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function guestHome(){ return view('guest.home'); }
    public function about(){ return view('guest.about'); }
    public function contact(){ return view('guest.contact'); }
    public function index(){ return view('warga.home'); }
}
