<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class AutoPartTypeRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\AutoPartType\AutoPartTypeRepositoryInterface::class,
            \App\Domain\Repositories\AutoPartType\AutoPartTypeRepositoryEloquent::class,
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
