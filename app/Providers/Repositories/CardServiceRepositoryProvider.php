<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class CardServiceRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\CardService\CardServiceRepositoryInterface::class,
            \App\Domain\Repositories\CardService\CardServiceRepositoryEloquent::class,
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
