<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class PartnerCardRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\PartnerCard\PartnerCardRepositoryInterface::class,
            \App\Domain\Repositories\PartnerCard\PartnerCardRepositoryEloquent::class,
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
