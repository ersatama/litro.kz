<?php

namespace App\Observers;

use App\Models\NotificationCount;
use App\Jobs\NotificationCount as NotificationCountJob;

class NotificationCountObserver
{
    /**
     * Handle the NotificationCount "created" event.
     *
     * @param NotificationCount $notificationCount
     * @return void
     */
    public function created(NotificationCount $notificationCount): void
    {
        NotificationCountJob::dispatch($notificationCount);
    }

    /**
     * Handle the NotificationCount "updated" event.
     *
     * @param NotificationCount $notificationCount
     * @return void
     */
    public function updated(NotificationCount $notificationCount)
    {
        //
    }

    /**
     * Handle the NotificationCount "deleted" event.
     *
     * @param NotificationCount $notificationCount
     * @return void
     */
    public function deleted(NotificationCount $notificationCount)
    {
        //
    }

    /**
     * Handle the NotificationCount "restored" event.
     *
     * @param NotificationCount $notificationCount
     * @return void
     */
    public function restored(NotificationCount $notificationCount)
    {
        //
    }

    /**
     * Handle the NotificationCount "force deleted" event.
     *
     * @param NotificationCount $notificationCount
     * @return void
     */
    public function forceDeleted(NotificationCount $notificationCount)
    {
        //
    }
}
