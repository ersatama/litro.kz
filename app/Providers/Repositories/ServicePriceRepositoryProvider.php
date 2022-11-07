<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class ServicePriceRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\ServicePrice\ServicePriceRepositoryInterface::class,
            \App\Domain\Repositories\ServicePrice\ServicePriceRepositoryEloquent::class,
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
