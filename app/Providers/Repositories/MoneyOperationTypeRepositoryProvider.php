<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class MoneyOperationTypeRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\MoneyOperationType\MoneyOperationTypeRepositoryInterface::class,
            \App\Domain\Repositories\MoneyOperationType\MoneyOperationTypeRepositoryEloquent::class,
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
