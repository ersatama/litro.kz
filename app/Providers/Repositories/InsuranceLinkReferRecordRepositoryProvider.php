<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class InsuranceLinkReferRecordRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\InsuranceLinkReferRecord\InsuranceLinkReferRecordRepositoryInterface::class,
            \App\Domain\Repositories\InsuranceLinkReferRecord\InsuranceLinkReferRecordRepositoryEloquent::class,
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
