<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class CarRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\Car\CarRepositoryInterface::class,
            \App\Domain\Repositories\Car\CarRepositoryEloquent::class,
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
