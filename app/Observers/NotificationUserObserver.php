<?php

namespace App\Observers;

use App\Jobs\NotificationUserOneSignal;
use App\Models\NotificationUser;

class NotificationUserObserver
{
    /**
     * Handle the NotificationUser "created" event.
     *
     * @param NotificationUser $notificationUser
     * @return void
     */
    public function created(NotificationUser $notificationUser): void
    {
        NotificationUserOneSignal::dispatch($notificationUser);
    }

    /**
     * Handle the NotificationUser "updated" event.
     *
     * @param NotificationUser $notificationUser
     * @return void
     */
    public function updated(NotificationUser $notificationUser): void
    {
        //
    }

    /**
     * Handle the NotificationUser "deleted" event.
     *
     * @param NotificationUser $notificationUser
     * @return void
     */
    public function deleted(NotificationUser $notificationUser): void
    {
        //
    }

    /**
     * Handle the NotificationUser "restored" event.
     *
     * @param NotificationUser $notificationUser
     * @return void
     */
    public function restored(NotificationUser $notificationUser): void
    {
        //
    }

    /**
     * Handle the NotificationUser "force deleted" event.
     *
     * @param NotificationUser $notificationUser
     * @return void
     */
    public function forceDeleted(NotificationUser $notificationUser): void
    {
        //
    }
}
