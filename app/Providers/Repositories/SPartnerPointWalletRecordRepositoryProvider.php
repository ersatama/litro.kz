<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class SPartnerPointWalletRecordRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\SPartnerPointWalletRecord\SPartnerPointWalletRecordRepositoryInterface::class,
            \App\Domain\Repositories\SPartnerPointWalletRecord\SPartnerPointWalletRecordRepositoryEloquent::class,
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
