<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/admin-panel', function(){
    return view('admin/admin-panel');
});

Route::get('/create-material', function(){
    return view('admin/material/create');
});
