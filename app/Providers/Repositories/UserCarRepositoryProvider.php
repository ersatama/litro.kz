<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class UserCarRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\UserCar\UserCarRepositoryInterface::class,
            \App\Domain\Repositories\UserCar\UserCarRepositoryEloquent::class,
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
