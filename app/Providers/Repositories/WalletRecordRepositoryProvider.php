<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class WalletRecordRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\WalletRecord\WalletRecordRepositoryInterface::class,
            \App\Domain\Repositories\WalletRecord\WalletRecordRepositoryEloquent::class,
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
