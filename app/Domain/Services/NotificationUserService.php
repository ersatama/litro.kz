<?php

namespace App\Domain\Services;

use App\Domain\Repositories\NotificationUser\NotificationUserRepositoryInterface;

class NotificationUserService extends MainService
{
    public NotificationUserRepositoryInterface $notificationUserRepository;
    public function __construct(NotificationUserRepositoryInterface $notificationUserRepository)
    {
        $this->notificationUserRepository   =   $notificationUserRepository;
    }
}
