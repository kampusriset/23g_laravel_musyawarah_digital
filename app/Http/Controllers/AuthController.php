<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    // Halaman login
    public function loginView() {
        return view('auth.login');
    }

    // Proses login
    public function loginCreate(Request $request) {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        $remember = $request->has('remember'); // Remember Me

        if (Auth::guard('web')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('warga.home');
        }

        return back()->with('error','Email atau password salah.');
    }

    // Halaman register
    public function registerView() {
        return view('auth.register');
    }

    // Proses register
    public function registerCreate(Request $request) {
        $request->validate([
            'username' => 'required|string|unique:warga,username',
            'email' => 'required|email|unique:warga,email',
            
            'nama_lengkap' => 'required|string',
            'gender' => 'required|in:L,P',
            'phone' => 'nullable|string',
            'address' => 'nullable|string'
        ]);

        $warga = Warga::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => 'warga',
            'is_active' => 1
        ]);

        Auth::guard('web')->login($warga);

        return redirect()->route('warga.home')->with('success','Register berhasil, selamat datang!');
    }

    // Logout
    public function logout(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.view');
    }
}
