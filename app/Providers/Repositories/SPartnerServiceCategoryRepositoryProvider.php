<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class SPartnerServiceCategoryRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\SPartnerServiceCategory\SPartnerServiceCategoryRepositoryInterface::class,
            \App\Domain\Repositories\SPartnerServiceCategory\SPartnerServiceCategoryRepositoryEloquent::class,
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
