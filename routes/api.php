<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\validateAdmin;
use App\Http\Controllers\API\AdminController;

Route::post('adminSignup', [validateAdmin::class, 'Signup']);
Route::post('adminLogin', [validateAdmin::class, 'Login']);
Route::post('adminLogout', [validateAdmin::class, 'Logout'])->middleware('auth:sanctum');

Route::apiResource('teachers', AdminController::class)->middleware('auth:sanctum');