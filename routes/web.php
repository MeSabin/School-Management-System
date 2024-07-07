<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin/welcome');
});
Route::get('/signup', function () {
    return view('admin/signup');
});
Route::get('/login', function () {
    return view('teachers/signup');
});
