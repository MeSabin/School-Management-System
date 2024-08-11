<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Use view composer to bind data to the layout
        View::composer('teachers.teacherLayout', function ($view) {
            $teacher = Auth::guard('web')->user();
            if ($teacher) {
                $view->with('name', $teacher->name)->with('email', $teacher->email)->with('image', $teacher->image);
            }
        });
        View::composer('admin.adminLayout', function ($view) {
            $admin = Auth::guard('admin')->user();
            if ($admin) {
                $view->with('name', $admin->name)->with('email', $admin->email);
            }
        });
        View::composer('students.studentLayout', function ($view) {
            $student = Auth::guard('student')->user();
            if ($student) {
                $view->with('name', $student->name)->with('email', $student->email);
            }
        });
    }
}
