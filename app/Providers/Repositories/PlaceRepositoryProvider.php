<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class PlaceRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\Place\PlaceRepositoryInterface::class,
            \App\Domain\Repositories\Place\PlaceRepositoryEloquent::class,
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
