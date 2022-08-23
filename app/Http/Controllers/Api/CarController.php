<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\CarService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Car\CarCollection;
use App\Http\Resources\Car\CarResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarController extends Controller
{
    protected CarService $carService;
    public function __construct(CarService $carService)
    {
        $this->carService   =   $carService;
    }

    /**
     * Получить список - Car
     *
     * @group Car - Автомобиль
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->carService->carRepository->count([]),
            MainContract::DATA  =>  new CarCollection($this->carService->carRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через OrderCardID - Car
     *
     * @group Car - Автомобиль
     */
    public function getByOrderCardId($orderCardId): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->carService->carRepository->count([MainContract::ORDER_CARD_ID => $orderCardId]),
            MainContract::DATA  =>  new CarCollection($this->carService->carRepository->getByOrderCardId($orderCardId))
        ],200);
    }

    /**
     * Получить данные через ID - Car
     *
     * @group Car - Автомобиль
     */
    public function getById($id): CarResource|Response|Application|ResponseFactory
    {
        if ($carModel = $this->carService->carRepository->getById($id)) {
            return new CarResource($carModel);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
