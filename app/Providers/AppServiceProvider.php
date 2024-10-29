<?php

namespace App\Providers;

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
        
        View::composer('movies.create', function ($view) {
            $genres = ['comedy', 'fantasy', 'horror', 'action', 'melodrama', 'mystic', 'detective'];
            $view->with('genres', $genres);
        });

    }
}
