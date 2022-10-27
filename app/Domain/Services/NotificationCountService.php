<?php

namespace App\Domain\Services;

use App\Domain\Repositories\NotificationCount\NotificationCountRepositoryInterface;

class NotificationCountService extends MainService
{
    public NotificationCountRepositoryInterface $notificationCountRepository;
    public function __construct(NotificationCountRepositoryInterface $notificationCountRepository)
    {
        $this->notificationCountRepository  =   $notificationCountRepository;
    }
}
