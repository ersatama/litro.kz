<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class TransactionRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\Transaction\TransactionRepositoryInterface::class,
            \App\Domain\Repositories\Transaction\TransactionRepositoryEloquent::class,
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
