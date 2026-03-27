<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin-panel', function(){
    return view('admin/admin-panel');
});

Route::get('/Question', function(){
     return view('Question');
});

Route::get('/Result', function(){
     return view('Result');
});