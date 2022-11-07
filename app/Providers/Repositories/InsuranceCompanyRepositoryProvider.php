<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class InsuranceCompanyRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\InsuranceCompany\InsuranceCompanyRepositoryInterface::class,
            \App\Domain\Repositories\InsuranceCompany\InsuranceCompanyRepositoryEloquent::class,
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
