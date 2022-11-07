<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class StockImageRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\StockImage\StockImageRepositoryInterface::class,
            \App\Domain\Repositories\StockImage\StockImageRepositoryEloquent::class,
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
