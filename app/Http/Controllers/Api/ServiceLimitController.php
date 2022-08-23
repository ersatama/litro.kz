<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\ServiceLimitService;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceLimit\ServiceLimitCollection;
use App\Http\Resources\ServiceLimit\ServiceLimitResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceLimitController extends Controller
{
    protected ServiceLimitService $serviceLimitService;
    public function __construct(ServiceLimitService $serviceLimitService)
    {
        $this->serviceLimitService  =   $serviceLimitService;
    }

    /**
     * Получить список - ServiceLimit
     *
     * @group ServiceLimit - СервисЛимит
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->serviceLimitService->serviceLimitRepository->count([]),
            MainContract::DATA  =>  new ServiceLimitCollection($this->serviceLimitService->serviceLimitRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - ServiceLimit
     *
     * @group ServiceLimit - СервисЛимит
     */
    public function getById($id): ServiceLimitResource|Response|Application|ResponseFactory
    {
        if ($serviceLimit = $this->serviceLimitService->serviceLimitRepository->getById($id)) {
            return new ServiceLimitResource($serviceLimit);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
