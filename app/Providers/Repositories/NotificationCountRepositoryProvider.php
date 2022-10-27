<?php

namespace App\Providers\Repositories;

use App\Models\Notification;
use App\Models\NotificationCount;
use App\Observers\NotificationCountObserver;
use App\Observers\NotificationObserver;
use Illuminate\Support\ServiceProvider;

class NotificationCountRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\NotificationCount\NotificationCountRepositoryInterface::class,
            \App\Domain\Repositories\NotificationCount\NotificationCountRepositoryEloquent::class,
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        NotificationCount::observe(NotificationCountObserver::class);
    }
}
