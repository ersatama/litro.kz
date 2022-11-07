<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class AutoPartCategoryRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\AutoPartCategory\AutoPartCategoryRepositoryInterface::class,
            \App\Domain\Repositories\AutoPartCategory\AutoPartCategoryRepositoryEloquent::class
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
