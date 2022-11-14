<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class EcoServiceImageRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\EcoServiceImage\EcoServiceImageRepositoryInterface::class,
            \App\Domain\Repositories\EcoServiceImage\EcoServiceImageRepositoryEloquent::class,
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
