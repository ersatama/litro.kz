<?php

namespace App\Http\Controllers\Api;

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

    public function get(): ServiceCollection
    {
        return new ServiceCollection($this->serviceService->get());
    }

    public function getById($id): Response|ServiceResource|Application|ResponseFactory
    {
        if ($service = $this->serviceService->getById($id)) {
            return new ServiceResource($service);
        }
        return response(['message'  =>  'Service not found'],404);
    }

}
