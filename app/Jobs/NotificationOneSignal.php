<?php

namespace App\Jobs;

use App\Domain\Contracts\Contract;
use App\Domain\Helpers\OneSignal;
use App\Models\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotificationOneSignal implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected Notification $notification;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Notification $notification)
    {
        $this->notification =   $notification;
    }

    /**
     * Execute the job.
     *
     * @param OneSignal $oneSignal
     * @return void
     */
    public function handle(OneSignal $oneSignal): void
    {
        $arr    =   [];
        $oneSignal->sendToAll(
            $this->notification->{Contract::DESCRIPTION},
            [],
            'default',
            '',
            $arr,
            $this->notification->{Contract::TITLE},
        );
    }
}
