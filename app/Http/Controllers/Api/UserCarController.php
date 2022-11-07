<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\UserCarService;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserCar\UserCarCollection;
use App\Http\Resources\UserCar\UserCarResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserCarController extends Controller
{
    protected UserCarService $userCarService;
    public function __construct(UserCarService $userCarService)
    {
        $this->userCarService   =   $userCarService;
    }

    /**
     * Получить список - UserCar
     *
     * @group UserCar - ПользовательАвтомобиль
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->userCarService->userCarRepository->count([]),
            Contract::DATA  =>  new UserCarCollection($this->userCarService->userCarRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через UserID - UserCar
     *
     * @group UserCar - ПользовательАвтомобиль
     */
    public function getByUserId($userId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->userCarService->userCarRepository->count([
                Contract::USER_ID   =>  $userId
            ]),
            Contract::DATA  =>  new UserCarCollection($this->userCarService->userCarRepository->getByUserId($userId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через CarModelID - UserCar
     *
     * @group UserCar - ПользовательАвтомобиль
     */
    public function getByCarModelId($carModelId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->userCarService->userCarRepository->count([
                Contract::CAR_MODEL_ID   =>  $carModelId
            ]),
            Contract::DATA  =>  new UserCarCollection($this->userCarService->userCarRepository->getByCarModelId($carModelId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - UserCar
     *
     * @group UserCar - ПользовательАвтомобиль
     */
    public function getById($id): Response|UserCarResource|Application|ResponseFactory
    {
        if ($model = $this->userCarService->userCarRepository->getById($id)) {
            return new UserCarResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
