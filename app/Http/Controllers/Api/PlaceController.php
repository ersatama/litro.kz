<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\PlaceService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Place\PlaceCollection;
use App\Http\Resources\Place\PlaceResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PlaceController extends Controller
{
    protected PlaceService $placeService;
    public function __construct(PlaceService $placeService)
    {
        $this->placeService =   $placeService;
    }

    /**
     * Получить список - Place
     *
     * @group Place - Места
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->placeService->placeRepository->count([]),
            MainContract::DATA  =>  new PlaceCollection($this->placeService->placeRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через CityID - Place
     *
     * @group Place - Места
     */
    public function getByCityId($cityId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->placeService->placeRepository->count([
                MainContract::CITY_ID   =>  $cityId
            ]),
            MainContract::DATA  =>  new PlaceCollection($this->placeService->placeRepository->getByCityId($cityId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ServiceID - Place
     *
     * @group Place - Места
     */
    public function getByServiceId($serviceId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->placeService->placeRepository->count([
                MainContract::SERVICE_ID => $serviceId
            ]),
            MainContract::DATA  =>  new PlaceCollection($this->placeService->placeRepository->getByServiceId($serviceId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - Place
     *
     * @group Place - Места
     */
    public function getById($id): Response|PlaceResource|Application|ResponseFactory
    {
        if ($model = $this->placeService->placeRepository->getById($id)) {
            return new PlaceResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
