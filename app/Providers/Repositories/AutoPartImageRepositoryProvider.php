<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class AutoPartImageRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\AutoPartImage\AutoPartImageRepositoryInterface::class,
            \App\Domain\Repositories\AutoPartImage\AutoPartImageRepositoryEloquent::class,
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
