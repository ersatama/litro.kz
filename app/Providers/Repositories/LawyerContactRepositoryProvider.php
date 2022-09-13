<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class LawyerContactRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\LawyerContact\LawyerContactRepositoryInterface::class,
            \App\Domain\Repositories\LawyerContact\LawyerContactRepositoryEloquent::class,
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
