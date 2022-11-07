<?php

namespace App\Providers\Repositories;

use App\Models\NotificationUser;
use App\Observers\NotificationUserObserver;
use Illuminate\Support\ServiceProvider;

class NotificationUserRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\NotificationUser\NotificationUserRepositoryInterface::class,
            \App\Domain\Repositories\NotificationUser\NotificationUserRepositoryEloquent::class,
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        NotificationUser::observe(NotificationUserObserver::class);
    }
}
