<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class CardRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\Card\CardRepositoryInterface::class,
            \App\Domain\Repositories\Card\CardRepositoryEloquent::class
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
