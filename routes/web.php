<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'login'])->name("login.view");
Route::post('/login', [AuthController::class, 'loginCreate'])->name('login.create')->middleware('throttle:3,5');
Route::get('/register', [AuthController::class, 'register'])->name('register.view');