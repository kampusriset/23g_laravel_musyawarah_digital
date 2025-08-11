<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
             
        }
    }
}
