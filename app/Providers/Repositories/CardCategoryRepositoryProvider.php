<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class CardCategoryRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\CardCategory\CardCategoryRepositoryInterface::class,
            \App\Domain\Repositories\CardCategory\CardCategoryRepositoryEloquent::class,
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
