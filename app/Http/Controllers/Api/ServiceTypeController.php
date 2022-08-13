<?php

namespace App\Http\Controllers\Api;

use App\Domain\Services\ServiceTypeService;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceType\ServiceTypeCollection;
use App\Http\Resources\ServiceType\ServiceTypeResource;
use App\Models\ServiceType;
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

    public function get(): ServiceTypeCollection
    {
        return new ServiceTypeCollection($this->serviceTypeService->get());
    }

    public function getById($id): Response|Application|ResponseFactory|ServiceTypeResource
    {
        if ($serviceType = $this->serviceTypeService->getById($id)) {
            return new ServiceTypeResource($serviceType);
        }
        return response(['message'  =>  'ServiceType not found'],404);
    }

}
