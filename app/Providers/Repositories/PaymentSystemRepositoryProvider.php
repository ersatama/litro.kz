<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class PaymentSystemRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\PaymentSystem\PaymentSystemRepositoryInterface::class,
            \App\Domain\Repositories\PaymentSystem\PaymentSystemRepositoryEloquent::class,
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
