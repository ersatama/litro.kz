<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class ThirdPartyAppRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\ThirdPartyApp\ThirdPartyAppRepositoryInterface::class,
            \App\Domain\Repositories\ThirdPartyApp\ThirdPartyAppRepositoryEloquent::class,
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
