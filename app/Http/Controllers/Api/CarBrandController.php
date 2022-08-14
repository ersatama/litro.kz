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

    public function get($skip = 0,$take = 1): Response|Application|ResponseFactory
    {
        return response([
            MainContract::INFO  =>  [
                MainContract::SKIP  =>  $skip,
                MainContract::TAKE  =>  $take,
                MainContract::COUNT =>  $this->carBrandService->count([]),
            ],
            MainContract::DATA  =>  new CarBrandCollection($this->carBrandService->get($skip,$take))
        ],200);
    }

}
