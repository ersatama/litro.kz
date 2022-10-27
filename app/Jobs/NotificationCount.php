<?php

namespace App\Jobs;

use App\Domain\Contracts\Contract;
use App\Domain\Services\NotificationCountService;
use App\Domain\Services\NotificationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\NotificationCount as NotificationCountModel;

class NotificationCount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected NotificationCountModel $notificationCount;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(NotificationCountModel $notificationCount)
    {
        $this->notificationCount    =   $notificationCount;
    }

    /**
     * Execute the job.
     *
     * @param NotificationService $notificationService
     * @param NotificationCountService $notificationCountService
     * @return void
     */
    public function handle(NotificationService $notificationService, NotificationCountService $notificationCountService): void
    {
        $notificationCount  =   $notificationCountService->notificationCountRepository->count([
            Contract::NOTIFICATION_ID   =>  $this->notificationCount->{Contract::NOTIFICATION_ID}
        ]);
        $notificationService->notificationRepository->update($this->notificationCount->{Contract::NOTIFICATION_ID},[
            Contract::VIEWS =>  $notificationCount
        ]);
    }
}
