<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class OrderServiceServiceRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\OrderServiceService\OrderServiceServiceRepositoryInterface::class,
            \App\Domain\Repositories\OrderServiceService\OrderServiceServiceRepositoryEloquent::class,
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
