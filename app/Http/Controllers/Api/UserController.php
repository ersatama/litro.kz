<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService  =   $userService;
    }

    /**
     * Получить список - User
     *
     * @group User - Пользователь
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->userService->userRepository->count([]),
            MainContract::DATA  =>  new UserCollection($this->userService->userRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через Phone Password - User
     *
     * @group User - Пользователь
     */
    public function getByPhoneAndPassword($phone,$password): Response|Application|ResponseFactory|UserResource
    {
        if ($model = $this->userService->userRepository->getByPhone($phone)) {
            if (Hash::make($password,$model->{MainContract::PASSWORD})) {
                return new UserResource($model);
            }
            return response(ErrorContract::FAILED_AUTH,401);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

    /**
     * Получить данные через ID - User
     *
     * @group User - Пользователь
     */
    public function getById($id): Response|UserResource|Application|ResponseFactory
    {
        if ($model = $this->userService->userRepository->getById($id)) {
            return new UserResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
