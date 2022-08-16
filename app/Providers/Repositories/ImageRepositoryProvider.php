<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class ImageRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\Image\ImageRepositoryInterface::class,
            \App\Domain\Repositories\Image\ImageRepositoryEloquent::class,
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
