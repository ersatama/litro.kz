<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Contracts\UserContract;
use App\Domain\Helpers\OldPassword;
use App\Domain\Requests\User\SearchRequest;
use App\Domain\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    protected UserService $userService;
    protected OldPassword $oldPassword;
    public function __construct(UserService $userService, OldPassword $oldPassword)
    {
        $this->userService  =   $userService;
        $this->oldPassword  =   $oldPassword;
    }

    /**
     * Получить список - User
     *
     * @group User - Пользователь
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->userService->userRepository->count([]),
            Contract::DATA  =>  new UserCollection($this->userService->userRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через Phone Password - User
     *
     * @group User - Пользователь
     */
    public function getByPhoneAndPassword($phone, $password): Response|Application|ResponseFactory|UserResource
    {
        if ($model = $this->userService->userRepository->getByPhone($phone)) {
            if (Hash::check($password,$model->{Contract::PASSWORD})) {
                return new UserResource($model);
            } elseif ($this->oldPassword->check($password,$model->{Contract::PASSWORD})) {
                $this->userService->userRepository->update($model->{Contract::ID},[
                    Contract::PASSWORD  =>  $password
                ]);
                return new UserResource($model);
            }
            return response(ErrorContract::FAILED_AUTH,401);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

    /**
     * Получить данные через Email Password - User
     *
     * @group User - Пользователь
     */
    public function getByEmailAndPassword($email,$password): Response|Application|ResponseFactory|UserResource
    {
        if ($model = $this->userService->userRepository->getByEmail($email)) {
            if (Hash::make($password,$model->{Contract::PASSWORD})) {
                return new UserResource($model);
            } elseif ($this->oldPassword->check($password,$model->{Contract::PASSWORD})) {
                $this->userService->userRepository->update($model->{Contract::ID},[
                    Contract::PASSWORD  =>  $password
                ]);
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

    /**
     * Получить данные через Android Token - User
     *
     * @group User - Пользователь
     */
    public function getByAndroidToken($token): Response|Application|ResponseFactory|UserResource
    {
        if ($model = $this->userService->userRepository->getByAndroid($token)) {
            return new UserResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

    /**
     * Получить данные через IOS Token - User
     *
     * @group User - Пользователь
     */
    public function getByIosToken($token): Response|Application|ResponseFactory|UserResource
    {
        if ($model = $this->userService->userRepository->getByIos($token)) {
            return new UserResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

    /**
     * @hideFromAPIDocumentation
     *
     * @throws ValidationException
     */
    public function search(SearchRequest $searchRequest): UserCollection
    {
        if ($search = $searchRequest->checked()) {
            return new UserCollection($this->userService->userRepository->search(UserContract::SEARCH,$search));
        }
        return new UserCollection($this->userService->userRepository->all());
    }

}
