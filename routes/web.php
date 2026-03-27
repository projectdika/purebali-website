<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/admin-panel', function(){
    return view('admin/admin-panel');
});

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

Route::get('/login', function(){
    return view('Auth/login');
});
Route::get('/register', function(){
    return view('Auth/register');
});
