<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class LawyerCityRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\LawyerCity\LawyerCityRepositoryInterface::class,
            \App\Domain\Repositories\LawyerCity\LawyerCityRepositoryEloquent::class,
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
