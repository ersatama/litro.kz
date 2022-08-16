<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class CategoryRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\Category\CategoryRepositoryInterface::class,
            \App\Domain\Repositories\Category\CategoryRepositoryEloquent::class,
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
