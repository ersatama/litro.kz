<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class InsuranceSelectOptionRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\InsuranceSelectOption\InsuranceSelectOptionRepositoryInterface::class,
            \App\Domain\Repositories\InsuranceSelectOption\InsuranceSelectOptionRepositoryEloquent::class,
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
