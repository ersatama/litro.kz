<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ErrorContract;
use App\Domain\Services\NotificationUserService;
use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationUser\NotificationUserCollection;
use App\Http\Resources\NotificationUser\NotificationUserResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotificationUserController extends Controller
{
    protected NotificationUserService $notificationUserService;
    public function __construct(NotificationUserService $notificationUserService)
    {
        $this->notificationUserService  =   $notificationUserService;
    }

    /**
     * Получить список - NotificationUser
     *
     * @group NotificationUser
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->notificationUserService->notificationUserRepository->count([]),
            Contract::DATA  =>  new NotificationUserCollection($this->notificationUserService->notificationUserRepository->get($skip,$take))
        ],200);
    }

    /**
     * обновить views через UserID - NotificationUser
     *
     * @group NotificationUser
     */
    public function updateViewByUserId($userId): Response|Application|ResponseFactory
    {
        $this->notificationUserService->notificationUserRepository->updateViewByUserId($userId);
        return response([
            Contract::USER_ID   =>  $userId,
            Contract::NOT_VIEWED    =>  0
        ],200);
    }

    /**
     * Получить данные через UserID - NotificationUser
     *
     * @group NotificationUser
     */
    public function getByUserId($userId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::NOT_VIEWED    =>  $this->notificationUserService->notificationUserRepository->count([
                Contract::USER_ID   =>  $userId,
                Contract::VIEWS =>  false
            ]),
            Contract::COUNT =>  $this->notificationUserService->notificationUserRepository->count([
                Contract::USER_ID   =>  $userId
            ]),
            Contract::DATA  =>  new NotificationUserCollection($this->notificationUserService->notificationUserRepository->getByUserId($userId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - NotificationUser
     *
     * @group NotificationUser
     */
    public function getById($id): Response|NotificationUserResource|Application|ResponseFactory
    {
        if ($news = $this->notificationUserService->notificationUserRepository->getById($id)) {
            return new NotificationUserResource($news);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
