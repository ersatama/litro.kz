<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class OrderCardOldRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\OrderCardOld\OrderCardOldRepositoryInterface::class,
            \App\Domain\Repositories\OrderCardOld\OrderCardOldRepositoryEloquent::class,
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
