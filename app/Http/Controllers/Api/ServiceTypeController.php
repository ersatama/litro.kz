<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\ServiceTypeService;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceType\ServiceTypeCollection;
use App\Http\Resources\ServiceType\ServiceTypeResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceTypeController extends Controller
{
    protected ServiceTypeService $serviceTypeService;
    public function __construct(ServiceTypeService $serviceTypeService)
    {
        $this->serviceTypeService   =   $serviceTypeService;
    }

    /**
     * Получить список - ServiceType
     *
     * @group ServiceType - СервисТип
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->serviceTypeService->serviceTypeRepository->count([]),
            MainContract::DATA  =>  new ServiceTypeCollection($this->serviceTypeService->serviceTypeRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - ServiceType
     *
     * @group ServiceType - СервисТип
     */
    public function getById($id): Response|Application|ResponseFactory|ServiceTypeResource
    {
        if ($serviceType = $this->serviceTypeService->serviceTypeRepository->getById($id)) {
            return new ServiceTypeResource($serviceType);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
