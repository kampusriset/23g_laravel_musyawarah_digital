<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Warga\HomeController;
use App\Http\Controllers\Warga\ChatController;
use App\Http\Controllers\Warga\NotulenController;
use App\Http\Controllers\Warga\VotingController;
use App\Http\Controllers\Warga\PresensiController;

// Guest pages
Route::get('/', [HomeController::class,'guestHome'])->name('guest.home');
Route::get('/about', [HomeController::class,'about'])->name('guest.about');
Route::get('/contact', [HomeController::class,'contact'])->name('guest.contact');

// Auth
Route::get('/login', [AuthController::class,'loginView'])->name('login.view');
Route::post('/login', [AuthController::class,'loginCreate'])->name('login.create');
Route::get('/register', [AuthController::class,'registerView'])->name('register.view');
Route::post('/register', [AuthController::class,'registerCreate'])->name('register.create');
Route::post('/logout', [AuthController::class,'logout'])->name('logout');

// Warga pages
Route::middleware(['auth:web'])->prefix('warga')->group(function(){
    Route::get('/home', [HomeController::class,'index'])->name('warga.home');
    Route::get('/chat', [ChatController::class,'index'])->name('warga.chat');
    Route::get('/notulen', [NotulenController::class,'index'])->name('warga.notulen');
    Route::get('/voting', [VotingController::class,'index'])->name('warga.voting');
    Route::get('/presensi', [PresensiController::class,'index'])->name('warga.presensi');
});
// Add this temporary route to test
Route::get('/debug-auth', function () {
    return response()->json([
        'web_guard' => [
            'authenticated' => auth('web')->check(),
            'user_id' => auth('web')->id(),
            'user_type' => auth('web')->user() ? get_class(auth('web')->user()) : null
        ],
        'warga_guard' => [
            'authenticated' => auth('warga')->check(),
            'user_id' => auth('warga')->id(),
            'user_type' => auth('warga')->user() ? get_class(auth('warga')->user()) : null
        ],
        'session_id' => session()->getId(),
        'cookies' => array_keys(request()->cookies->all())
    ]);
});