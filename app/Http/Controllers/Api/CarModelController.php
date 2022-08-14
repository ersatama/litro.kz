<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\MainContract;
use App\Domain\Services\CarModelService;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarModel\CarModelCollection;
use App\Http\Resources\CarModel\CarModelResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarModelController extends Controller
{
    protected CarModelService $carModelService;
    public function __construct(CarModelService $carModelService)
    {
        $this->carModelService  =   $carModelService;
    }

    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::INFO  =>  [
                MainContract::SKIP  =>  $skip,
                MainContract::TAKE  =>  $take,
                MainContract::COUNT =>  $this->carModelService->count([]),
            ],
            MainContract::DATA  =>  new CarModelCollection($this->carModelService->get($skip,$take))
        ],200);
    }


    public function getByCarBrandId($carBrandId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::INFO  =>  [
                MainContract::SKIP  =>  $skip,
                MainContract::TAKE  =>  $take,
                MainContract::COUNT =>  $this->carModelService->count([
                    MainContract::CAR_BRAND_ID,$carBrandId
                ]),
            ],
            MainContract::DATA  =>  new CarModelCollection($this->carModelService->getByCarBrandId($carBrandId,$skip,$take))
        ],200);
    }

    public function getById($id): Response|CarModelResource|Application|ResponseFactory
    {
        if ($carModel = $this->carModelService->getById($id)) {
            return new CarModelResource($carModel);
        }
        return response(['message'  =>  'Модель не найдена'],404);
    }

}
