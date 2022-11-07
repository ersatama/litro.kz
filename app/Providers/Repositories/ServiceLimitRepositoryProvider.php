<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class ServiceLimitRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\ServiceLimit\ServiceLimitRepositoryInterface::class,
            \App\Domain\Repositories\ServiceLimit\ServiceLimitRepositoryEloquent::class
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
