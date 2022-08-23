<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\MainContract;
use App\Domain\Services\CarBrandService;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarBrand\CarBrandCollection;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarBrandController extends Controller
{
    protected CarBrandService $carBrandService;
    public function __construct(CarBrandService $carBrandService)
    {
        $this->carBrandService  =   $carBrandService;
    }

    /**
     * Получить список - CarBrand
     *
     * @group CarBrand - АвтомобильБрэнд
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->carBrandService->carBrandRepository->count([]),
            MainContract::DATA  =>  new CarBrandCollection($this->carBrandService->carBrandRepository->get($skip,$take))
        ],200);
    }
}
