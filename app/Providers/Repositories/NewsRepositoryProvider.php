<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class NewsRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\News\NewsRepositoryInterface::class,
            \App\Domain\Repositories\News\NewsRepositoryEloquent::class
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
