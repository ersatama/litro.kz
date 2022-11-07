<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class ServiceTypeRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\ServiceType\ServiceTypeRepositoryInterface::class,
            \App\Domain\Repositories\ServiceType\ServiceTypeRepositoryEloquent::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
