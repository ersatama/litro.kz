<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class CardRangeRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\CardRange\CardRangeRepositoryInterface::class,
            \App\Domain\Repositories\CardRange\CardRangeRepositoryEloquent::class,
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
