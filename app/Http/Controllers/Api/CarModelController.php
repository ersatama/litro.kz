<?php

namespace App\Http\Controllers\Api;

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

    public function get(): CarModelCollection
    {
        return new CarModelCollection($this->carModelService->get());
    }

    public function getById($id): Response|CarModelResource|Application|ResponseFactory
    {
        if ($carModel = $this->carModelService->getById($id)) {
            return new CarModelResource($carModel);
        }
        return response(['message'  =>  'Модель не найдена'],404);
    }

    public function getByBrandId($brandId): CarModelCollection
    {
        return new CarModelCollection($this->carModelService->getByBrandId($brandId));
    }

}
