<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ErrorContract;
use App\Domain\Services\UserImageService;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserImage\UserImageCollection;
use App\Http\Resources\UserImage\UserImageResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserImageController extends Controller
{
    protected UserImageService $userImageService;
    public function __construct(UserImageService $userImageService)
    {
        $this->userImageService =   $userImageService;
    }

    /**
     * Получить список - UserImage
     *
     * @group UserImage
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->userImageService->userImageRepository->count([]),
            Contract::DATA  =>  new UserImageCollection($this->userImageService->userImageRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через UserID - UserImage
     *
     * @group UserImage
     */
    public function getByUserId($userId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->userImageService->userImageRepository->count([
                Contract::USER_ID   =>  $userId
            ]),
            Contract::DATA  =>  new UserImageCollection($this->userImageService->userImageRepository->getByUserId($userId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - UserImage
     *
     * @group UserImage
     */
    public function getById($id): Response|Application|UserImageResource|ResponseFactory
    {
        if ($model = $this->userImageService->userImageRepository->getById($id)) {
            return new UserImageResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
