<?php

namespace App\Http\Controllers\Api;

use App\Domain\Services\CarBrandService;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarBrand\CarBrandCollection;
use Illuminate\Http\Request;

class CarBrandController extends Controller
{
    protected CarBrandService $carBrandService;
    public function __construct(CarBrandService $carBrandService)
    {
        $this->carBrandService  =   $carBrandService;
    }

    public function get(): CarBrandCollection
    {
        return new CarBrandCollection($this->carBrandService->get());
    }

}
