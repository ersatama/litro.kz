<?php

namespace App\Domain\Services;

use App\Domain\Repositories\NotificationType\NotificationTypeRepositoryInterface;

class NotificationTypeService extends MainService
{
    public NotificationTypeRepositoryInterface $notificationTypeRepository;
    public function __construct(NotificationTypeRepositoryInterface $notificationTypeRepository)
    {
        $this->notificationTypeRepository   =   $notificationTypeRepository;
    }
}
