<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class CurrencyRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\Currency\CurrencyRepositoryInterface::class,
            \App\Domain\Repositories\Currency\CurrencyRepositoryEloquent::class
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
