<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class CarModelAveragePriceRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\CarModelAveragePrice\CarModelAveragePriceRepositoryInterface::class,
            \App\Domain\Repositories\CarModelAveragePrice\CarModelAveragePriceRepositoryEloquent::class,
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
