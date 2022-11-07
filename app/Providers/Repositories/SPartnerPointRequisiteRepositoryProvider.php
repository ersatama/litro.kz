<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class SPartnerPointRequisiteRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\SPartnerPointRequisite\SPartnerPointRequisiteRepositoryInterface::class,
            \App\Domain\Repositories\SPartnerPointRequisite\SPartnerPointRequisiteRepositoryEloquent::class,
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
