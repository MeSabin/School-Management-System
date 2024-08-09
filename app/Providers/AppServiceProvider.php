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
    }
}
