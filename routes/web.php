<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Teacher\validTeacher;
use App\Http\Middleware\Admin\validAdmin;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Middleware\PreventLoginWithoutLogout;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Teacher\validateLogin;
use App\Http\Controllers\Admin\validateAdmin;


Route::view('/', 'teachers/login')->name('teacherLogin')->middleware(PreventLoginWithoutLogout::class);
Route::view('/admin', 'admin/login')->name('adminLogin');
// Route::view('/signup', 'admin/signup')->name('adminSingup');
Route::view('/layout', 'mainDashLayout')->name('layout');


Route::resource('teachers', AdminController::class)->middleware(validAdmin::class);

Route::prefix('admin')->group(function() {
   Route::post('/login', [validateAdmin::class, 'loginAdmin'])->name('checkAdminLogin');
   Route::get('/dashboard',[validateAdmin::class, 'adminDashboard'])->name('adminDash')->middleware(validAdmin::class, PreventBackHistory::class);
   Route::get('/logout',[validateAdmin::class, 'Logout'])->name('logoutAdmin');
   // Route::get('/teachersList', [AdminController::class, 'index'])->name('teachersList')->middleware(validAdmin::class);
   // Route::post('/registerTeacher','admin/registerTeacher')->name('registerTeacher')->middleware(validAdmin::class);
   // Route::view('/updateTeacher','admin/updateTeacher')->name('updateTeacher')->middleware(validAdmin::class);
});

Route::post('/teacher/login', [validateLogin::class, 'Login'])->name('checkTeacherLogin');
Route::get('/teacher/dashboard',[validateLogin::class, 'teacherDashboard'])->name('teacherDash')->middleware(validTeacher::class, PreventBackHistory::class);
Route::get('/teacher/logout',[validateLogin::class, 'Logout'])->name('logoutTeacher');