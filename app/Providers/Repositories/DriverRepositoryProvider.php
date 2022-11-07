<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class DriverRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\Driver\DriverRepositoryInterface::class,
            \App\Domain\Repositories\Driver\DriverRepositoryEloquent::class,
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
