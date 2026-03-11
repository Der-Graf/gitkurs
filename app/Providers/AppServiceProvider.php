<?php

namespace App\Providers;

use Illuminate\Auth\Access\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; // NEU

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
        //
        Paginator::useBootstrapFive(); // NEU

        // Gate::define('task-entry',function()
        // {
        //     return true;
        // }
        // );
    }
}
