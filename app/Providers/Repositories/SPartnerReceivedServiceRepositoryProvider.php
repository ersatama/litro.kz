<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class SPartnerReceivedServiceRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\SPartnerReceivedService\SPartnerReceivedServiceRepositoryInterface::class,
            \App\Domain\Repositories\SPartnerReceivedService\SPartnerReceivedServiceRepositoryEloquent::class,
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
