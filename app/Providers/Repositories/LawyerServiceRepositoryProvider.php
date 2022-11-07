<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class LawyerServiceRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\LawyerService\LawyerServiceRepositoryInterface::class,
            \App\Domain\Repositories\LawyerService\LawyerServiceRepositoryEloquent::class,
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
