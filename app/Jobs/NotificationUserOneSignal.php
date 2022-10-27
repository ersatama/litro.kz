<?php

namespace App\Jobs;

use App\Domain\Contracts\Contract;
use App\Domain\Helpers\OneSignal;
use App\Domain\Services\UserService;
use App\Models\NotificationUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotificationUserOneSignal implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public NotificationUser $notificationUser;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(NotificationUser $notificationUser)
    {
        $this->notificationUser =   $notificationUser;
    }

    /**
     * Execute the job.
     *
     * @param OneSignal $oneSignal
     * @param UserService $userService
     * @return void
     */
    public function handle(OneSignal $oneSignal, UserService $userService): void
    {
        $arr    =   [];
        $user   =   $userService->userRepository->getById($this->notificationUser->{Contract::USER_ID});
        $oneSignal->send(
            $user,
            $this->notificationUser->{Contract::TITLE},
            [],
            'default',
            0,
            '',
            $arr,
        );
    }
}
