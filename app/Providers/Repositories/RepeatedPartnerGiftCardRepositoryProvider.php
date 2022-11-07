<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class RepeatedPartnerGiftCardRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\RepeatedPartnerGiftCard\RepeatedPartnerGiftCardRepositoryInterface::class,
            \App\Domain\Repositories\RepeatedPartnerGiftCard\RepeatedPartnerGiftCardRepositoryRepositoryEloquent::class,
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
