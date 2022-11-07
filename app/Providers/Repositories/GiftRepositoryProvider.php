<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class GiftRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\Gift\GiftRepositoryInterface::class,
            \App\Domain\Repositories\Gift\GiftRepositoryEloquent::class,
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
