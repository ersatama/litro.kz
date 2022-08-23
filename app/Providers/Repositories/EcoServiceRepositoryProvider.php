<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class EcoServiceRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\EcoService\EcoServiceRepositoryInterface::class,
            \App\Domain\Repositories\EcoService\EcoServiceRepositoryEloquent::class,
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
