<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Teacher\validTeacher;
use App\Http\Middleware\Admin\validAdmin;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Middleware\PreventLoginWithoutLogout;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Teacher\validateLogin;
use App\Http\Controllers\Admin\validateAdmin;
use App\Http\Controllers\Admin\AdminForgotPass;
use App\Http\Controllers\Admin\AdminPagesController;


Route::view('/', 'teachers/login')->name('teacherLogin')->middleware(PreventLoginWithoutLogout::class);
Route::view('/admin', 'admin/login')->name('adminLogin');
Route::view('/layout', 'mainDashLayout')->name('layout');


Route::resource('teachers', AdminController::class)->names('teachers')->middleware(validAdmin::class, PreventBackHistory::class);

Route::prefix('admin')->group(function() {
   Route::post('/login', [validateAdmin::class, 'loginAdmin'])->name('checkAdminLogin');
   Route::get('/dashboard',[validateAdmin::class, 'adminDashboard'])->name('adminDash')->middleware(validAdmin::class, PreventBackHistory::class);
   Route::get('/logout',[validateAdmin::class, 'Logout'])->name('logoutAdmin');
   Route::get('/forgot-password', [AdminForgotPass::class , 'showForgotPassForm'])->name('adminForgotPass');
   Route::post('/process-forgot-password', [AdminForgotPass::class , 'processForgotPass'])->name('processAdminForgotPass');
   Route::get ('/reset-password/{token}', [AdminForgotPass::class , 'resetPassword'])->name('adminResetPass');
   Route::post ('/process-reset-password', [AdminForgotPass::class , 'processResetPassword'])->name('processResetPassword');
   Route::get ('/curriculumns', [AdminPagesController::class , 'showCurriculumns'])->name('showCurriculumns');
});

Route::post('/teacher/login', [validateLogin::class, 'Login'])->name('checkTeacherLogin');
Route::get('/teacher/dashboard',[validateLogin::class, 'teacherDashboard'])->name('teacherDash')->middleware(validTeacher::class, PreventBackHistory::class);
Route::get('/teacher/logout',[validateLogin::class, 'Logout'])->name('logoutTeacher');