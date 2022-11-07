<?php

namespace App\Domain\Services;

use App\Domain\Contracts\Contract;
use App\Domain\Repositories\Notification\NotificationRepositoryInterface;
use App\Domain\Repositories\NotificationCount\NotificationCountRepositoryInterface;
use App\Models\NotificationCount;

class NotificationService extends MainService
{
    public NotificationRepositoryInterface $notificationRepository;
    public NotificationCountRepositoryInterface $notificationCountRepository;
    public function __construct(
        NotificationRepositoryInterface $notificationRepository,
        NotificationCountRepositoryInterface $notificationCountRepository
    )
    {
        $this->notificationRepository   =   $notificationRepository;
        $this->notificationCountRepository  =   $notificationCountRepository;
    }

    public function getByNotificationTypeIdAndCityIdWithUser($userId,$notificationTypeId,$cityId,$skip,$take)
    {
        $notifications  =   $this->notificationRepository->getByNotificationTypeIdAndCityId($notificationTypeId,$cityId,$skip,$take);
        foreach ($notifications as &$notification)
        {
            $notification->{Contract::USER} =   $this->notificationCountRepository->getByNotificationIdAndUserId($notificationTypeId,$userId);
        }
        return $notifications;
    }
}
