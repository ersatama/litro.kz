<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class InsuranceCompanyRequestLogRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\InsuranceCompanyRequestLog\InsuranceCompanyRequestLogRepositoryInterface::class,
            \App\Domain\Repositories\InsuranceCompanyRequestLog\InsuranceCompanyRequestLogRepositoryEloquent::class,
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
