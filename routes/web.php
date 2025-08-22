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
Route::middleware(['auth:warga'])->prefix('warga')->group(function(){
    Route::get('/home', [HomeController::class,'index'])->name('warga.home');
    Route::get('/chat', [ChatController::class,'index'])->name('warga.chat');
    Route::get('/notulen', [NotulenController::class,'index'])->name('warga.notulen');
    Route::get('/voting', [VotingController::class,'index'])->name('warga.voting');
    Route::get('/presensi', [PresensiController::class,'index'])->name('warga.presensi');
});
