<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class OrderCardChosenServiceRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\OrderCardChosenService\OrderCardChosenServiceRepositoryInterface::class,
            \App\Domain\Repositories\OrderCardChosenService\OrderCardChosenServiceRepositoryEloquent::class
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
