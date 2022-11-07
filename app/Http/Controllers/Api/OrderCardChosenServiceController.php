<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ErrorContract;
use App\Domain\Services\OrderCardChosenServiceService;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderCardChosenService\OrderCardChosenServiceCollection;
use App\Http\Resources\OrderCardChosenService\OrderCardChosenServiceResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderCardChosenServiceController extends Controller
{
    protected OrderCardChosenServiceService $orderCardChosenServiceService;
    public function __construct(OrderCardChosenServiceService $orderCardChosenServiceService)
    {
        $this->orderCardChosenServiceService    =   $orderCardChosenServiceService;
    }

    /**
     * Получить список - OrderCardChosenService
     *
     * @group OrderCardChosenService
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->orderCardChosenServiceService->orderCardChosenServiceRepository->count([]),
            Contract::DATA  =>  new OrderCardChosenServiceCollection($this->orderCardChosenServiceService->orderCardChosenServiceRepository->get($skip,$take))
        ],200);
    }


    /**
     * Получить данные через ID - OrderCardChosenService
     *
     * @group OrderCardChosenService
     */
    public function getById($id): Response|OrderCardChosenServiceResource|Application|ResponseFactory
    {
        if ($orderService = $this->orderCardChosenServiceService->orderCardChosenServiceRepository->getById($id)) {
            return new OrderCardChosenServiceResource($orderService);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
