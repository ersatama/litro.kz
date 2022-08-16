<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class AutoPartRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\AutoPart\AutoPartRepositoryInterface::class,
            \App\Domain\Repositories\AutoPart\AutoPartRepositoryEloquent::class,
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
