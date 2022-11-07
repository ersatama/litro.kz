<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class SPartnerPointCategoryRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\SPartnerPointCategory\SPartnerPointCategoryRepositoryInterface::class,
            \App\Domain\Repositories\SPartnerPointCategory\SPartnerPointCategoryRepositoryEloquent::class,
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
