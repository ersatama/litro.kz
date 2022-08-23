<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\MainContract;
use App\Domain\Services\CarCategoryService;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarCategory\CarCategoryCollection;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarCategoryController extends Controller
{
    protected CarCategoryService $carCategoryService;
    public function __construct(CarCategoryService $carCategoryService)
    {
        $this->carCategoryService   =   $carCategoryService;
    }

    /**
     * Получить список - CarCategory
     *
     * @group CarCategory - АвтомобильКатегория
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->carCategoryService->carCategoryRepository->count([]),
            MainContract::DATA  =>  new CarCategoryCollection($this->carCategoryService->carCategoryRepository->get($skip,$take))
        ],200);
    }

}
