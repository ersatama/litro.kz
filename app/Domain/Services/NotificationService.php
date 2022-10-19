<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Notification\NotificationRepositoryInterface;

class NotificationService extends MainService
{
    public NotificationRepositoryInterface $notificationRepository;
    public function __construct(NotificationRepositoryInterface $notificationRepository)
    {
        $this->notificationRepository   =   $notificationRepository;
    }
}
