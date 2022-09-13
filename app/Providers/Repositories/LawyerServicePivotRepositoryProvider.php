<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class LawyerServicePivotRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\LawyerServicePivot\LawyerServicePivotRepositoryInterface::class,
            \App\Domain\Repositories\LawyerServicePivot\LawyerServicePivotRepositoryEloquent::class,
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
