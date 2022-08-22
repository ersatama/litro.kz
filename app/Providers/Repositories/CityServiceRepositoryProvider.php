<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class CityServiceRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\CityService\CityServiceRepositoryInterface::class,
            \App\Domain\Repositories\CityService\CityServiceRepositoryEloquent::class,
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
