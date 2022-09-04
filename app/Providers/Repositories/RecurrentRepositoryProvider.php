<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class RecurrentRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\Recurrent\RecurrentRepositoryInterface::class,
            \App\Domain\Repositories\Recurrent\RecurrentRepositoryEloquent::class,
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
