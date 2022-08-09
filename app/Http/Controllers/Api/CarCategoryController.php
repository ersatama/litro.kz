<?php

namespace App\Http\Controllers\Api;

use App\Domain\Services\CarCategoryService;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarCategory\CarCategoryCollection;
use Illuminate\Http\Request;

class CarCategoryController extends Controller
{
    protected CarCategoryService $carCategoryService;
    public function __construct(CarCategoryService $carCategoryService)
    {
        $this->carCategoryService   =   $carCategoryService;
    }

    public function get(): CarCategoryCollection
    {
        return new CarCategoryCollection($this->carCategoryService->get());
    }

}
