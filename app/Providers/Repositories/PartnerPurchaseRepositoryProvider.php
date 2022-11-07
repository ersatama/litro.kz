<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class PartnerPurchaseRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\PartnerPurchase\PartnerPurchaseRepositoryInterface::class,
            \App\Domain\Repositories\PartnerPurchase\PartnerPurchaseRepositoryEloquent::class,
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
