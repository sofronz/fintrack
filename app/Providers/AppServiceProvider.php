<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Interfaces\CategoryInterface::class,
            \App\Services\CategoryService::class
        );

        $this->app->bind(
            \App\Interfaces\TransactionInterface::class,
            \App\Services\TransactionService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
