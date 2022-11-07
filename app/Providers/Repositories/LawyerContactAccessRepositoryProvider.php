<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class LawyerContactAccessRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\LawyerContactAccess\LawyerContactAccessRepositoryInterface::class,
            \App\Domain\Repositories\LawyerContactAccess\LawyerContactAccessRepositoryEloquent::class,
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
