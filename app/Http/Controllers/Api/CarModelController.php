<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
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

    /**
     * Получить список - CarModel
     *
     * @group CarModel - АвтомобильМодель
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->carModelService->carModelRepository->count([]),
            Contract::DATA  =>  new CarModelCollection($this->carModelService->carModelRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через CarBrandID - CarModel
     *
     * @group CarModel - АвтомобильМодель
     */
    public function getByCarBrandId($carBrandId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->carModelService->carModelRepository->count([Contract::CAR_BRAND_ID => $carBrandId]),
            Contract::DATA  =>  new CarModelCollection($this->carModelService->carModelRepository->getByCarBrandId($carBrandId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - CarModel
     *
     * @group CarModel - АвтомобильМодель
     */
    public function getById($id): Response|CarModelResource|Application|ResponseFactory
    {
        if ($carModel = $this->carModelService->carModelRepository->getById($id)) {
            return new CarModelResource($carModel);
        }
        return response(['message'  =>  'Модель не найдена'],404);
    }
}
