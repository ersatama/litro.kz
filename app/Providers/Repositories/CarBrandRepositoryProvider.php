<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class CarBrandRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\CarBrand\CarBrandRepositoryInterface::class,
            \App\Domain\Repositories\CarBrand\CarBrandRepositoryEloquent::class,
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
