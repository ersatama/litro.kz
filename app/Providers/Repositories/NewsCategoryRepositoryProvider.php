<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class NewsCategoryRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\NewsCategory\NewsCategoryRepositoryInterface::class,
            \App\Domain\Repositories\NewsCategory\NewsCategoryRepositoryEloquent::class
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
