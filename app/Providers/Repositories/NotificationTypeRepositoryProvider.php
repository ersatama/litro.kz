<?php

namespace App\Providers\Repositories;

use Illuminate\Support\ServiceProvider;

class NotificationTypeRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\NotificationType\NotificationTypeRepositoryInterface::class,
            \App\Domain\Repositories\NotificationType\NotificationTypeRepositoryEloquent::class,
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
