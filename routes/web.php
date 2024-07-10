<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\validTeacher;
use App\Http\Middleware\validAdmin;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\validateLogin;
use App\Http\Controllers\validateAdmin;


Route::get('/', function () {
    return view('teachers/login');
})->name('loginPage');


Route::get('/admin', function(){
    return view('admin/login');
})->name('loginAdmin');

Route::get('/signup', function () {
    return view('admin/signup');
});


Route::resource('teachers', AdminController::class);

Route::post('/', [validateLogin::class, 'Login'])->name('teacherLogin');
Route::post('/adminLogin', [validateAdmin::class, 'loginAdmin'])->name('adminLogin');
Route::get('/dashboard',[validateLogin::class, 'teacherDashboard'])->name('dashboard')->middleware(validTeacher::class);
Route::get('/adminDash',[validateAdmin::class, 'adminDashboard'])->name('adminDash')->middleware(validAdmin::class);
// Route::get('/adminDashboard',[validateAdmin::class, 'adminDashboard'])->name('adminDashboard');
Route::get('/logout',[validateLogin::class, 'Logout'])->name('logout');
Route::get('/logoutAdmin',[validateAdmin::class, 'Logout'])->name('logoutAdmin');