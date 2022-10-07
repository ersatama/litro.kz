<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ErrorContract;
use App\Domain\Services\UserProfileService;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserProfile\UserProfileCollection;
use App\Http\Resources\UserProfile\UserProfileResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserProfileController extends Controller
{
    protected UserProfileService $userProfileService;
    public function __construct(UserProfileService $userProfileService)
    {
        $this->userProfileService   =   $userProfileService;
    }

    /**
     * Получить список - UserProfile
     *
     * @group UserProfile
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->userProfileService->userProfileRepository->count([]),
            Contract::DATA  =>  new UserProfileCollection($this->userProfileService->userProfileRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через UserID - UserProfile
     *
     * @group UserProfile
     */
    public function getByUserId($userId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->userProfileService->userProfileRepository->count([
                Contract::USER_ID   =>  $userId
            ]),
            Contract::DATA  =>  new UserProfileCollection($this->userProfileService->userProfileRepository->getByUserId($userId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - UserProfile
     *
     * @group UserProfile
     */
    public function getById($id): UserProfileResource|Response|Application|ResponseFactory
    {
        if ($model = $this->userProfileService->userProfileRepository->getById($id)) {
            return new UserProfileResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
