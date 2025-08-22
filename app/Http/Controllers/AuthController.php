<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginView(){ return view('auth.login'); }
    public function registerView(){ return view('auth.register'); }

    public function registerCreate(Request $r){
        $r->validate([
            'nama_lengkap'=>'required|string',
            'username'=>'required|string|unique:wargas',
            'email'=>'required|email|unique:wargas',
            'password'=>'required|min:6|confirmed'
        ]);

        Warga::create([
            'nama_lengkap'=>$r->nama_lengkap,
            'username'=>$r->username,
            'email'=>$r->email,
            'password'=>Hash::make($r->password)
        ]);

        return redirect()->route('login.view')->with('success','Registrasi berhasil.');
    }

    public function loginCreate(Request $r){
        $credentials = $r->only('email','password');
        $remember = $r->has('remember');

        if(Auth::guard('warga')->attempt($credentials,$remember)){
            return redirect()->route('warga.home');
        }
        return back()->with('error','Email atau password salah.');
    }

    public function logout(){
        Auth::guard('warga')->logout();
        Session::flush();
        return redirect()->route('guest.home');
    }
}
