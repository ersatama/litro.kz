<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\CarModelAveragePriceService;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarModelAveragePrice\CarModelAveragePriceCollection;
use App\Http\Resources\CarModelAveragePrice\CarModelAveragePriceResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarModelAveragePriceController extends Controller
{
    protected CarModelAveragePriceService $carModelAveragePriceService;
    public function __construct(CarModelAveragePriceService $carModelAveragePriceService)
    {
        $this->carModelAveragePriceService  =   $carModelAveragePriceService;
    }

    /**
     * Получить список - CarModelAveragePrice
     *
     * @group CarModelAveragePrice - АвтомобильМодельСредняяЦена
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->carModelAveragePriceService->carModelAveragePriceRepository->count([]),
            MainContract::DATA  =>  new CarModelAveragePriceCollection($this->carModelAveragePriceService->carModelAveragePriceRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через CarModelID - CarModelAveragePrice
     *
     * @group CarModelAveragePrice - АвтомобильМодельСредняяЦена
     */
    public function getByCarModelId($carModelId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->carModelAveragePriceService->carModelAveragePriceRepository->count([MainContract::CAR_MODEL_ID => $carModelId]),
            MainContract::DATA  =>  new CarModelAveragePriceCollection($this->carModelAveragePriceService->carModelAveragePriceRepository->getByCarModelId($carModelId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - CarModelAveragePrice
     *
     * @group CarModelAveragePrice - АвтомобильМодельСредняяЦена
     */
    public function getById($id): CarModelAveragePriceResource|Response|Application|ResponseFactory
    {
        if ($carModel = $this->carModelAveragePriceService->carModelAveragePriceRepository->getById($id)) {
            return new CarModelAveragePriceResource($carModel);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
