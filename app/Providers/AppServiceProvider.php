<?php

namespace App\Providers;

use App\Models\Blog;
use Illuminate\Support\ServiceProvider;
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
         View::composer('landingPage.components.footer', function ($view) {
        $blogs_footer = Blog::with('category')->latest()->take(3)->get();
        $view->with('blogs_footer', $blogs_footer);
    });
    }
}
