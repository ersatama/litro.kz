<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class MoneyOperationRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\MoneyOperation\MoneyOperationRepositoryInterface::class,
            \App\Domain\Repositories\MoneyOperation\MoneyOperationRepositoryEloquent::class
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
