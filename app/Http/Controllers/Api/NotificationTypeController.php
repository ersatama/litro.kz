<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ErrorContract;
use App\Domain\Services\NotificationTypeService;
use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationType\NotificationTypeCollection;
use App\Http\Resources\NotificationType\NotificationTypeResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotificationTypeController extends Controller
{
    protected NotificationTypeService $notificationTypeService;
    public function __construct(NotificationTypeService $notificationTypeService)
    {
        $this->notificationTypeService  =   $notificationTypeService;
    }

    /**
     * Получить список - NotificationType
     *
     * @group NotificationType
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->notificationTypeService->notificationTypeRepository->count([]),
            Contract::DATA  =>  new NotificationTypeCollection($this->notificationTypeService->notificationTypeRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - NotificationType
     *
     * @group NotificationType
     */
    public function getById($id): Response|NotificationTypeResource|Application|ResponseFactory
    {
        if ($news = $this->notificationTypeService->notificationTypeRepository->getById($id)) {
            return new NotificationTypeResource($news);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
