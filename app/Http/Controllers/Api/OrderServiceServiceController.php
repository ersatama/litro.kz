<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ErrorContract;
use App\Domain\Services\OrderServiceServiceService;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderServiceService\OrderServiceServiceCollection;
use App\Http\Resources\OrderServiceService\OrderServiceServiceResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderServiceServiceController extends Controller
{
    protected OrderServiceServiceService $orderServiceServiceService;
    public function __construct(OrderServiceServiceService $orderServiceServiceService)
    {
        $this->orderServiceServiceService   =   $orderServiceServiceService;
    }

    /**
     * Получить список - OrderServiceService
     *
     * @group OrderServiceService
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->orderServiceServiceService->orderServiceServiceRepository->count([]),
            Contract::DATA  =>  new OrderServiceServiceCollection($this->orderServiceServiceService->orderServiceServiceRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через OrderServiceID - OrderServiceService
     *
     * @group OrderServiceService
     */
    public function getByOrderServiceId($orderServiceId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->orderServiceServiceService->orderServiceServiceRepository->count([
                Contract::ORDER_SERVICE_ID  =>  $orderServiceId
            ]),
            Contract::DATA  =>  new OrderServiceServiceCollection($this->orderServiceServiceService->orderServiceServiceRepository->getByOrderServiceId($orderServiceId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ServiceID - OrderServiceService
     *
     * @group OrderServiceService
     */
    public function getByServiceId($serviceId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->orderServiceServiceService->orderServiceServiceRepository->count([
                Contract::SERVICE_ID    =>  $serviceId
            ]),
            Contract::DATA  =>  new OrderServiceServiceCollection($this->orderServiceServiceService->orderServiceServiceRepository->getByServiceId($serviceId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - OrderServiceService
     *
     * @group OrderServiceService
     */
    public function getById($id): Response|OrderServiceServiceResource|Application|ResponseFactory
    {
        if ($orderService = $this->orderServiceServiceService->orderServiceServiceRepository->getById($id)) {
            return new OrderServiceServiceResource($orderService);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
