<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class OrderServiceRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\OrderService\OrderServiceRepositoryInterface::class,
            \App\Domain\Repositories\OrderService\OrderServiceRepositoryEloquent::class,
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
