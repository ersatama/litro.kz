<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class PartnerRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\Partner\PartnerRepositoryInterface::class,
            \App\Domain\Repositories\Partner\PartnerRepositoryEloquent::class,
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
