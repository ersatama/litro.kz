<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class OrderCardImportRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\OrderCardImport\OrderCardImportRepositoryInterface::class,
            \App\Domain\Repositories\OrderCardImport\OrderCardImportRepositoryEloquent::class,
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
