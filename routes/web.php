<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\validTeacher;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('teachers/login');
});
Route::get('/signup', function () {
    return view('admin/signup');
});

Route::get('/dashboard', function(){
    return view('admin/dashboard');
});

// Route::get('/dashboard',[TeacherController::class, 'dahsboard'])->middleware(validTeacher::class);

Route::resource('teachers', AdminController::class);