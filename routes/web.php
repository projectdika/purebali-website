<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/budaya/{id}', [HomeController::class, 'show'])->name('budaya.detail');
Route::get('/about', [HomeController::class, 'about'])->name('about');