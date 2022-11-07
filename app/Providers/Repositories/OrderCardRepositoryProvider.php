<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class OrderCardRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\OrderCard\OrderCardRepositoryInterface::class,
            \App\Domain\Repositories\OrderCard\OrderCardRepositoryEloquent::class,
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
