<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Services\NotificationCountService;
use App\Domain\Services\NotificationService;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotificationCountController extends Controller
{
    protected NotificationCountService $notificationCountService;
    protected NotificationService $notificationService;

    public function __construct(NotificationCountService $notificationCountService, NotificationService $notificationService)
    {
        $this->notificationCountService =   $notificationCountService;
        $this->notificationService  =   $notificationService;
    }

    public function update($cityId,$userId): Response|Application|ResponseFactory
    {
        $notifications  =   $this->notificationService->notificationRepository->getByCityId($cityId);
        foreach ($notifications as &$notification) {
            $this->notificationCountService->notificationCountRepository->upsert(
                [
                    [
                        Contract::NOTIFICATION_ID   =>  $notification->{Contract::ID},
                        Contract::USER_ID   =>  $userId,
                    ]
                ],
                [Contract::NOTIFICATION_ID,Contract::USER_ID],
                [Contract::NOTIFICATION_ID,Contract::USER_ID]
            );
        }
        return response([
            Contract::CITY_ID   =>  $cityId,
            Contract::USER_ID   =>  $userId,
            Contract::NOT_VIEWED    =>  0
        ],200);
    }
}
