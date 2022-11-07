<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class CarModelRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\CarModel\CarModelRepositoryInterface::class,
            \App\Domain\Repositories\CarModel\CarModelRepositoryEloquent::class,
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
