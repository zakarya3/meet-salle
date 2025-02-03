<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();
         // Define a gate for admin role
    Gate::define('is-admin', function ($user) {
        return $user->role === 'admin';
    });

    // Define a gate for user role
    Gate::define('is-co-admin', function ($user) {
        return $user->role === 'co-admin';
    });
    }
}
