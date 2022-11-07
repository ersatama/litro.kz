<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class CarCategoryRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\CarCategory\CarCategoryRepositoryInterface::class,
            \App\Domain\Repositories\CarCategory\CarCategoryRepositoryEloquent::class,
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
