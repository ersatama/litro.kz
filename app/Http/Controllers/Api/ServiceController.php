<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
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

    /**
     * Получить список - Service
     *
     * @group Service - Сервис
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->serviceService->serviceRepository->count([]),
            MainContract::DATA  =>  new ServiceCollection($this->serviceService->serviceRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - Service
     *
     * @group Service - Сервис
     */
    public function getById($id): Response|ServiceResource|Application|ResponseFactory
    {
        if ($service = $this->serviceService->serviceRepository->getById($id)) {
            return new ServiceResource($service);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
