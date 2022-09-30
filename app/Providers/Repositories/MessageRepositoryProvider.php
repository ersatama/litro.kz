<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class MessageRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\Message\MessageRepositoryInterface::class,
            \App\Domain\Repositories\Message\MessageRepositoryEloquent::class,
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
