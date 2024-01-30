<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Category; 
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
    public function boot()
    {
        if (Schema::hasTable('categories')){
            $categories = Category::all();
            View::share(['categories' => $categories]);
        }
    }
}