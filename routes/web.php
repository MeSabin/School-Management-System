<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Teacher\validTeacher;
use App\Http\Middleware\Admin\validAdmin;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Teacher\validateLogin;
use App\Http\Controllers\Admin\validateAdmin;


// Route::get('/', function () {
//     return view('teachers/login');
// })->name('teacherLogin');

Route::view('/', 'teachers/login')->name('teacherLogin')->middleware(PreventBackHistory::class);
Route::view('/admin', 'admin/login')->name('adminLogin');
Route::view('/signup', 'admin/signup')->name('adminSingup');
Route::view('/studentList', 'teachers/studentList')->name('adminSingup');

// Route::get('/admin', function(){
//     return view('admin/login');
// })->name('adminLogin');

// Route::get('/signup', function () {
//     return view('admin/signup');
// });


Route::resource('teachers', AdminController::class);

Route::post('/admin/login', [validateAdmin::class, 'loginAdmin'])->name('checkAdminLogin');
Route::get('/admin/dashboard',[validateAdmin::class, 'adminDashboard'])->name('adminDash')->middleware(validAdmin::class);
Route::get('/admin/logout',[validateAdmin::class, 'Logout'])->name('logoutAdmin');

Route::post('/teacher/login', [validateLogin::class, 'Login'])->name('checkTeacherLogin');
Route::get('/teacher/dashboard',[validateLogin::class, 'teacherDashboard'])->name('teacherDash')->middleware(validTeacher::class, PreventBackHistory::class);
Route::get('/teacher/logout',[validateLogin::class, 'Logout'])->name('logoutTeacher');