<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Teacher\validTeacher;
use App\Http\Middleware\Admin\validAdmin;
use App\Http\Middleware\Student\validStudent;
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
use App\Http\Controllers\Admin\BulkStudents;
use App\Http\Controllers\Teacher\TeacherPagesController;
use App\Http\Controllers\Student\validateStudent;
use App\Http\Controllers\Student\StudentPagesController;


Route::view('/', 'teachers/login')->name('teacherLogin');
Route::view('/admin', 'admin/login')->name('adminLogin');
Route::view('/student-login', 'students/login')->name('studentLogin');
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
   Route::get('bulkAddForm', [BulkStudents::class , 'showBulkAddForm'])->name('showBulkAddForm')->middleware(validAdmin::class, PreventBackHistory::class);
   Route::post('storeBulkStudents', [BulkStudents::class , 'storeBulkStudents'])->name('storeBulkStudents')->middleware(validAdmin::class, PreventBackHistory::class);
   Route::get('viewBulkStudents', [BulkStudents::class , 'viewBulkStudents'])->name('viewBulkStudents')->middleware(validAdmin::class, PreventBackHistory::class);
   Route::post('bulkStudentsTable', [BulkStudents::class , 'bulkStudentsTable'])->name('bulkStudentsTable')->middleware(validAdmin::class, PreventBackHistory::class);
});

Route::prefix('/teacher')->group(function(){
   Route::post('/login', [validateLogin::class, 'Login'])->name('checkTeacherLogin');
   Route::get('/dashboard',[validateLogin::class, 'teacherDashboard'])->name('teacherDash')->middleware(validTeacher::class, PreventBackHistory::class);
   Route::get('/logout',[validateLogin::class, 'Logout'])->name('logoutTeacher');
   Route::get('/students-section',[TeacherPagesController::class, 'getTeacherModules_Groups'])->name('studentsSection');
   Route::post('/students',[TeacherPagesController::class, 'getAssignedStudents'])->name('viewStudents');
   Route::get('/assignments',[TeacherPagesController::class, 'assignments'])->name('assignments');
   Route::post('/post-assignment',[TeacherPagesController::class, 'storeAssignmentDetails'])->name('postAssignment');
   Route::delete('/delete-assignment/{id}',[TeacherPagesController::class, 'deleteAssignment'])->name('deleteAssignment');
   Route::get('/view-submissions/{id}',[TeacherPagesController::class, 'viewSubmissions'])->name('viewSubmissions');
});

Route::prefix('/student')->group(function(){
   Route::post('/login', [validateStudent::class, 'Login'])->name('checkStudentLogin');
   Route::get('/dashboard',[validateStudent::class, 'studentDashboard'])->name('studentDashboard')->middleware(validStudent::class, PreventBackHistory::class);
   Route::get('/logout',[validateStudent::class, 'Logout'])->name('logoutStudent');
   Route::get('/students',[StudentPagesController::class, 'viewStudents'])->name('viewGroupStudents');
   Route::get('/assignments',[StudentPagesController::class, 'viewAssignment'])->name('viewAssignment');
   Route::post('/submit-assignment/{id}',[StudentPagesController::class, 'submitAssignment'])->name('submitAssignment');
});