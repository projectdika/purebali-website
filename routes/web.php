<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MaterialController;

Route::get('/Question', function(){
     return view('Question');
});
Route::get('/result', function(){
     return view('result');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cultures', [HomeController::class, 'cultures'])->name('cultures.index');
Route::get('/culture/{id}', [HomeController::class, 'show'])->name('culture.show');

Route::get('/about', function() {
    return view('about');
})->name('about');

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

