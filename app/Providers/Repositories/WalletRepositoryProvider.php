<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class WalletRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\Wallet\WalletRepositoryInterface::class,
            \App\Domain\Repositories\Wallet\WalletRepositoryEloquent::class,
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
