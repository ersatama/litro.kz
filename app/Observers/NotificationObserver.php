<?php

namespace App\Observers;

use App\Jobs\NotificationOneSignal;
use App\Models\Notification;

class NotificationObserver
{
    /**
     * Handle the Notification "created" event.
     *
     * @param Notification $notification
     * @return void
     */
    public function created(Notification $notification): void
    {
        NotificationOneSignal::dispatch($notification);
    }

    /**
     * Handle the Notification "updated" event.
     *
     * @param Notification $notification
     * @return void
     */
    public function updated(Notification $notification)
    {
        //
    }

    /**
     * Handle the Notification "deleted" event.
     *
     * @param Notification $notification
     * @return void
     */
    public function deleted(Notification $notification)
    {
        //
    }

    /**
     * Handle the Notification "restored" event.
     *
     * @param Notification $notification
     * @return void
     */
    public function restored(Notification $notification)
    {
        //
    }

    /**
     * Handle the Notification "force deleted" event.
     *
     * @param Notification $notification
     * @return void
     */
    public function forceDeleted(Notification $notification)
    {
        //
    }
}
