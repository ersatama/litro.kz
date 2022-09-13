<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class InsuranceSelectRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\InsuranceSelect\InsuranceSelectRepositoryInterface::class,
            \App\Domain\Repositories\InsuranceSelect\InsuranceSelectRepositoryEloquent::class,
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
