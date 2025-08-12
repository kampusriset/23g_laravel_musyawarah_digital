<?php

namespace App\Http\Controllers;

use App\Models\ModelsAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('home');
    }
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    public function loginCreate(Request $request){
            $request->validate([
                'email'=>'required|string',
                'password'=>'required|string'
            ]);

            $credentials = [
                'password' => $request->password,
            ];

            if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
                $credentials['email'] = $request->email;
            }else {
                $credentials['username'] = $request->email;
            }
            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
                return redirect()->route('home')->with("success", "Login Berhasil Anda Akan Di Alihkan Ke Dashboard");
            }
            return back()->with("error", "Username Atau Password Salah");
    }
    public function registerCreate(Request $request){
        $request->validate([
            'nama_lengkap'=>'required|string',
            'username'=>'required|string',
            'email'=>'email|required',
            'no_hp'=>'numeric|required',
            'gender'=>'required|string',
            'password'=>'string|required',
            're_password'=>'string|required'
        ]);

        if($request->password != $request->re_password){
            return back()->with("error", "Password dan Konfirmasi Password Tidak Sama");
        }

        ModelsAuth::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username'  => $request->username,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            "gender" => $request->gender,
            "role" => 'warga',
            "password"=> Hash::make($request->password),
            "is_active" => '0'
        ]);
        return redirect()->route('login.view')->with("success", "Registrasi Berhasil Silahkan Login");
    }
}
