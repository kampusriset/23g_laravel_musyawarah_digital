<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Warga\HomeController;
use App\Http\Controllers\Warga\ObrolanController;
use App\Http\Controllers\Warga\NotulenController;
use App\Http\Controllers\Warga\VotingController;
use App\Http\Controllers\Warga\PresensiController;

// Guest (tanpa login)
Route::get('/',        [GuestController::class,'home'])->name('guest.home');
Route::get('/about',   [GuestController::class,'about'])->name('guest.about');
Route::get('/contact', [GuestController::class,'contact'])->name('guest.contact');

// Auth
Route::get('/login',    [AuthController::class,'loginView'])->name('login.view');
Route::post('/login',   [AuthController::class,'loginCreate'])->name('login.create');
Route::get('/register', [AuthController::class,'registerView'])->name('register.view');
Route::post('/register',[AuthController::class,'registerCreate'])->name('register.create');
Route::post('/logout',  [AuthController::class,'logout'])->name('logout');

// Warga (harus login)
Route::middleware(['auth:web'])->prefix('warga')->name('warga.')->group(function () {
    Route::get('/home', [HomeController::class,'index'])->name('home');

    // Chat (Obrolan CRUD + lampiran sederhana)
    Route::resource('obrolan', ObrolanController::class);

    // Notulensi CRUD
    Route::resource('notulen', NotulenController::class);

    // Voting: CRUD Usulan + aksi vote
    Route::get('voting',                 [VotingController::class,'index'])->name('voting.index');
    Route::get('voting/create',          [VotingController::class,'create'])->name('voting.create');
    Route::post('voting',                [VotingController::class,'store'])->name('voting.store');
    Route::get('voting/{id}/edit',       [VotingController::class,'edit'])->name('voting.edit');
    Route::put('voting/{id}',            [VotingController::class,'update'])->name('voting.update');
    Route::delete('voting/{id}',         [VotingController::class,'destroy'])->name('voting.destroy');
    Route::post('voting/{id}/vote',      [VotingController::class,'vote'])->name('voting.vote');

    // Presensi CRUD sederhana
    Route::get('presensi',               [PresensiController::class,'index'])->name('presensi.index');
    Route::get('presensi/create',        [PresensiController::class,'create'])->name('presensi.create');
    Route::post('presensi',              [PresensiController::class,'store'])->name('presensi.store');
    Route::delete('presensi/{id}',       [PresensiController::class,'destroy'])->name('presensi.destroy');
});
