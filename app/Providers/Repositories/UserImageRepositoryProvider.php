<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class UserImageRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\UserImage\UserImageRepositoryInterface::class,
            \App\Domain\Repositories\UserImage\UserImageRepositoryEloquent::class
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
