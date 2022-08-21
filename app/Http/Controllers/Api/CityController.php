<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\MainContract;
use App\Domain\Services\CityService;
use App\Http\Controllers\Controller;
use App\Http\Resources\City\CityCollection;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CityController extends Controller
{
    protected CityService $cityService;
    public function __construct(CityService $cityService)
    {
        $this->cityService  =   $cityService;
    }

    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->cityService->cityRepository->count([]),
            MainContract::DATA  =>  new CityCollection($this->cityService->cityRepository->get($skip,$take))
        ],200);
    }

}
