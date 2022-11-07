<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class AutoPartParamRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\AutoPartParam\AutoPartParamRepositoryInterface::class,
            \App\Domain\Repositories\AutoPartParam\AutoPartParamRepositoryEloquent::class
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
