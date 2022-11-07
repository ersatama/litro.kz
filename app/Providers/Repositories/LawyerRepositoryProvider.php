<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class LawyerRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\Lawyer\LawyerRepositoryInterface::class,
            \App\Domain\Repositories\Lawyer\LawyerRepositoryEloquent::class,
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
