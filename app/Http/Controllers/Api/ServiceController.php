<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\MainContract;
use App\Domain\Services\ServiceService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Service\ServiceCollection;
use App\Http\Resources\Service\ServiceResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceController extends Controller
{
    protected ServiceService $serviceService;
    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService   =   $serviceService;
    }

    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::INFO  =>  [
                MainContract::SKIP  =>  $skip,
                MainContract::TAKE  =>  $take,
                MainContract::COUNT =>  $this->serviceService->count([]),
            ],
            MainContract::DATA  =>  new ServiceCollection($this->serviceService->get($skip,$take))
        ],200);
    }

    public function getById($id): Response|ServiceResource|Application|ResponseFactory
    {
        if ($service = $this->serviceService->getById($id)) {
            return new ServiceResource($service);
        }
        return response(['message'  =>  'Service not found'],404);
    }

}
