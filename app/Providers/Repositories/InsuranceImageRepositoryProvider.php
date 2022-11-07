<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class InsuranceImageRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\InsuranceImage\InsuranceImageRepositoryInterface::class,
            \App\Domain\Repositories\InsuranceImage\InsuranceImageRepositoryEloquent::class,
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
