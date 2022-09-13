<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\LawyerCityService;
use App\Http\Controllers\Controller;
use App\Http\Resources\LawyerCity\LawyerCityCollection;
use App\Http\Resources\LawyerCity\LawyerCityResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LawyerCityController extends Controller
{
    protected LawyerCityService $lawyerCityService;
    public function __construct(LawyerCityService $lawyerCityService)
    {
        $this->lawyerCityService    =   $lawyerCityService;
    }

    /**
     * Получить список - LawyerCity
     *
     * @group LawyerCity
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->lawyerCityService->lawyerCityRepository->count([]),
            MainContract::DATA  =>  new LawyerCityCollection($this->lawyerCityService->lawyerCityRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через CityID - LawyerCity
     *
     * @group LawyerCity
     */
    public function getByCityId($cityId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->lawyerCityService->lawyerCityRepository->count([
                MainContract::CITY_ID   =>  $cityId
            ]),
            MainContract::DATA  =>  new LawyerCityCollection($this->lawyerCityService->lawyerCityRepository->getByCityId($cityId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - LawyerCity
     *
     * @group LawyerCity
     */
    public function getById($id): Response|LawyerCityResource|Application|ResponseFactory
    {
        if ($model = $this->lawyerCityService->lawyerCityRepository->getById($id)) {
            return new LawyerCityResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
