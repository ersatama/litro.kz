<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class ServiceImageRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\ServiceImage\ServiceImageRepositoryInterface::class,
            \App\Domain\Repositories\ServiceImage\ServiceImageRepositoryEloquent::class,
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
