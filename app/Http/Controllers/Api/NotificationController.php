<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ErrorContract;
use App\Domain\Services\NotificationCountService;
use App\Domain\Services\NotificationService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Notification\NotificationCollection;
use App\Http\Resources\Notification\NotificationResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotificationController extends Controller
{
    protected NotificationService $notificationService;
    protected NotificationCountService $notificationCountService;
    public function __construct(NotificationService $notificationService, NotificationCountService $notificationCountService)
    {
        $this->notificationService  =   $notificationService;
        $this->notificationCountService =   $notificationCountService;
    }

    /**
     * Получить список - Notification
     *
     * @group Notification
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->notificationService->notificationRepository->count([]),
            Contract::DATA  =>  new NotificationCollection($this->notificationService->notificationRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через NotificationTypeId и CityID c пользователем - Notification
     *
     * @group Notification
     */
    public function getByNotificationTypeIdAndCityIdWithUser($userId,$notificationTypeId,$cityId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->notificationService->notificationRepository->count([
                Contract::NOTIFICATION_TYPE_ID  =>  $notificationTypeId,
                Contract::CITY_ID   =>  $cityId
            ]),
            Contract::DATA  =>  new NotificationCollection($this->notificationService->getByNotificationTypeIdAndCityIdWithUser($userId,$notificationTypeId,$cityId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через NotificationTypeId и CityID - Notification
     *
     * @group Notification
     */
    public function getByNotificationTypeIdAndCityId($notificationTypeId,$cityId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->notificationService->notificationRepository->count([
                Contract::NOTIFICATION_TYPE_ID  =>  $notificationTypeId,
                Contract::CITY_ID   =>  $cityId
            ]),
            Contract::DATA  =>  new NotificationCollection($this->notificationService->notificationRepository->getByNotificationTypeIdAndCityId($notificationTypeId,$cityId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через NotificationTypeIdAndUserId - Notification
     *
     * @group Notification
     */
    public function getByNotificationTypeIdAndUserId($notificationTypeId,$userId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::NOT_VIEWED    =>  $this->notificationCountService->notificationCountRepository->countNotViewedByNotificationTypeIdAndUserId($userId, $this->notificationService->notificationRepository->getIds($notificationTypeId)),
            Contract::COUNT =>  $this->notificationService->notificationRepository->countWhere([
                Contract::NOTIFICATION_TYPE_ID  =>  $notificationTypeId,
            ]),
            Contract::DATA  =>  new NotificationCollection($this->notificationService->notificationRepository->getByNotificationTypeId($notificationTypeId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через NotificationTypeId - Notification
     *
     * @group Notification
     */
    public function getByNotificationTypeId($notificationTypeId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->notificationService->notificationRepository->count([
                Contract::NOTIFICATION_TYPE_ID  =>  $notificationTypeId,
            ]),
            Contract::DATA  =>  new NotificationCollection($this->notificationService->notificationRepository->getByNotificationTypeId($notificationTypeId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через CityID - Notification
     *
     * @group Notification
     */
    public function getByCityId($cityId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->notificationService->notificationRepository->count([
                Contract::CITY_ID   =>  $cityId
            ]),
            Contract::DATA  =>  new NotificationCollection($this->notificationService->notificationRepository->getByCityId($cityId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - Notification
     *
     * @group Notification
     */
    public function getById($id): Response|NotificationResource|Application|ResponseFactory
    {
        if ($news = $this->notificationService->notificationRepository->getById($id)) {
            return new NotificationResource($news);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
