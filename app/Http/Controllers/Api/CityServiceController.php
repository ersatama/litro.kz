<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\CityServiceService;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityService\CityServiceCollection;
use App\Http\Resources\CityService\CityServiceResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CityServiceController extends Controller
{
    protected CityServiceService $cityServiceService;
    public function __construct(CityServiceService $cityServiceService)
    {
        $this->cityServiceService   =   $cityServiceService;
    }

    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->cityServiceService->cityServiceRepository->count([]),
            MainContract::DATA  =>  new CityServiceCollection($this->cityServiceService->cityServiceRepository->get($skip,$take))
        ],200);
    }

    public function getByServiceId($serviceId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->cityServiceService->cityServiceRepository->count([
                MainContract::SERVICE_ID => $serviceId
            ]),
            MainContract::DATA  =>  new CityServiceCollection($this->cityServiceService->cityServiceRepository->getByServiceId($serviceId,$skip,$take))
        ],200);
    }

    public function getByCityId($cityId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->cityServiceService->cityServiceRepository->count([
                MainContract::CITY_ID => $cityId
            ]),
            MainContract::DATA  =>  new CityServiceCollection($this->cityServiceService->cityServiceRepository->getByCityId($cityId,$skip,$take))
        ],200);
    }

    public function getById($id): Response|CityServiceResource|Application|ResponseFactory
    {
        if ($carModel = $this->cityServiceService->cityServiceRepository->getById($id)) {
            return new CityServiceResource($carModel);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
