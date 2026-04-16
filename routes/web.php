<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MaterialController;

Route::get('/Question', function(){
     return view('Question');
});
Route::get('/Result', function(){
     return view('Result');
});
Route::get('/create-material', function(){
    return view('admin/material/create');
});
Route::get('/balinese-cultures', function(){
    return view('balinese-cultures');
});
Route::get('/detail-material', function(){
    return view('detail-material');
});
Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/budaya/{id}', [HomeController::class, 'show'])->name('budaya.detail');
Route::get('/about', [HomeController::class, 'about'])->name('about');

//BATAS YANG BENER, YANG BENER DI BAWAH

Route::middleware('auth')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
});

Route::middleware('admin')->group(function() {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::resource('materials', MaterialController::class);
    });
});

