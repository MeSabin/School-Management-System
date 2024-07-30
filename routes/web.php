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
use App\Http\Controllers\Admin\CS_Subjects;
use App\Http\Controllers\Admin\AssignSubjectToTeacher;
use App\Http\Controllers\Admin\Student;


Route::view('/', 'teachers/login')->name('teacherLogin');
Route::view('/admin', 'admin/login')->name('adminLogin');
Route::view('/layout', 'mainDashLayout')->name('layout');


Route::resource('teachers', AdminController::class)->names('teachers')->middleware(validAdmin::class, PreventBackHistory::class);
Route::resource('subjects', CS_Subjects::class)->names('subjects')->middleware(validAdmin::class, PreventBackHistory::class);
Route::resource('assign-module-teacher', AssignSubjectToTeacher::class)->names('assignModuleTeacher')->middleware(validAdmin::class, PreventBackHistory::class);
Route::resource('students', Student::class)->names('students')->middleware(validAdmin::class, PreventBackHistory::class);

Route::prefix('admin')->group(function() {
   Route::post('/login', [validateAdmin::class, 'loginAdmin'])->name('checkAdminLogin');
   Route::get('/dashboard',[validateAdmin::class, 'adminDashboard'])->name('adminDash')->middleware(validAdmin::class, PreventBackHistory::class);
   Route::get('/logout',[validateAdmin::class, 'Logout'])->name('logoutAdmin');
   Route::get('/forgot-password', [AdminForgotPass::class , 'showForgotPassForm'])->name('adminForgotPass');
   Route::post('/process-forgot-password', [AdminForgotPass::class , 'processForgotPass'])->name('processAdminForgotPass');
   Route::get ('/reset-password/{token}', [AdminForgotPass::class , 'resetPassword'])->name('adminResetPass');
   Route::post ('/process-reset-password', [AdminForgotPass::class , 'processResetPassword'])->name('processResetPassword');
   Route::get ('/curriculumns/addClass', [AdminPagesController::class , 'addClass'])->name('adminAddClass')->middleware(validAdmin::class);
   Route::get('/curriculumns/viewClass', [AdminPagesController::class, 'viewGroups'])->name('viewGroups')->middleware(validAdmin::class);
   Route::post ('/storeClassDetails', [AdminPagesController::class , 'storeClassDetails'])->name('storeClassDetails')->middleware(validAdmin::class);
   Route::delete('/deleteClassDetails/{id}', [AdminPagesController::class, 'deleteClass'])->name('deleteClassDetails');
});

Route::post('/teacher/login', [validateLogin::class, 'Login'])->name('checkTeacherLogin');
Route::get('/teacher/dashboard',[validateLogin::class, 'teacherDashboard'])->name('teacherDash')->middleware(validTeacher::class, PreventBackHistory::class);
Route::get('/teacher/logout',[validateLogin::class, 'Logout'])->name('logoutTeacher');