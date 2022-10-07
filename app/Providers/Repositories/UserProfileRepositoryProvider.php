<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class UserProfileRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\UserProfile\UserProfileRepositoryInterface::class,
            \App\Domain\Repositories\UserProfile\UserProfileRepositoryEloquent::class,
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
