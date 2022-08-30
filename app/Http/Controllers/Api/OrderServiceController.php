<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\OrderServiceService;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderService\OrderServiceCollection;
use App\Http\Resources\OrderService\OrderServiceResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderServiceController extends Controller
{
    protected OrderServiceService $orderServiceService;
    public function __construct(OrderServiceService $orderServiceService)
    {
        $this->orderServiceService  =   $orderServiceService;
    }

    /**
     * Получить список - OrderService
     *
     * @group OrderService - ЗаказСервис
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->orderServiceService->orderServiceRepository->count([]),
            MainContract::DATA  =>  new OrderServiceCollection($this->orderServiceService->orderServiceRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через UserID - OrderService
     *
     * @group OrderService - ЗаказСервис
     */
    public function getByUserId($userId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->orderServiceService->orderServiceRepository->count([
                MainContract::USER_ID   =>  $userId
            ]),
            MainContract::DATA  =>  new OrderServiceCollection($this->orderServiceService->orderServiceRepository->getByUserId($userId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через CityID - OrderService
     *
     * @group OrderService - ЗаказСервис
     */
    public function getByCityId($cityId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->orderServiceService->orderServiceRepository->count([
                MainContract::CITY_ID   =>  $cityId
            ]),
            MainContract::DATA  =>  new OrderServiceCollection($this->orderServiceService->orderServiceRepository->getByCityId($cityId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через PlaceID - OrderService
     *
     * @group OrderService - ЗаказСервис
     */
    public function getByPlaceId($placeId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->orderServiceService->orderServiceRepository->count([
                MainContract::PLACE_ID  =>  $placeId
            ]),
            MainContract::DATA  =>  new OrderServiceCollection($this->orderServiceService->orderServiceRepository->getByPlaceId($placeId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через OrderCardID - OrderService
     *
     * @group OrderService - ЗаказСервис
     */
    public function getByOrderCardId($orderCardId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->orderServiceService->orderServiceRepository->count([
                MainContract::ORDER_CARD_ID =>  $orderCardId
            ]),
            MainContract::DATA  =>  new OrderServiceCollection($this->orderServiceService->orderServiceRepository->getByOrderCardId($orderCardId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - OrderService
     *
     * @group OrderService - ЗаказСервис
     */
    public function getById($id): Response|OrderServiceResource|Application|ResponseFactory
    {
        if ($orderService = $this->orderServiceService->orderServiceRepository->getById($id)) {
            return new OrderServiceResource($orderService);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
