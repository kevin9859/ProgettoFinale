<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Category; 
use Illuminate\Support\Facades\View;
use App\Models\Tag;
use Laravel\Fortify\Contracts\VerifyEmailViewResponse;
use Illuminate\Contracts\Support\Responsable;

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

        if (Schema::hasTable('tags')){
            $tags = Tag::all();
            View::share(['tags' => $tags]);
        }

        $this->app->singleton(VerifyEmailViewResponse::class, function ($app) {
            return new class implements Responsable {
                public function toResponse($request)
                {
                    return view('auth.verify-email');
                }
            };
        });
    }
}