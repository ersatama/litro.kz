<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ErrorContract;
use App\Domain\Services\OrderCardOldService;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderCardOld\OrderCardOldCollection;
use App\Http\Resources\OrderCardOld\OrderCardOldResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderCardOldController extends Controller
{
    protected OrderCardOldService $orderCardOldService;
    public function __construct(OrderCardOldService $orderCardOldService)
    {
        $this->orderCardOldService  =   $orderCardOldService;
    }

    /**
     * Получить список - OrderCardOld
     *
     * @group OrderCardOld
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->orderCardOldService->orderCardOldRepository->count([]),
            Contract::DATA  =>  new OrderCardOldCollection($this->orderCardOldService->orderCardOldRepository->get($skip,$take))
        ],200);
    }


    /**
     * Получить данные через ID - OrderCardOld
     *
     * @group OrderCardOld
     */
    public function getById($id): OrderCardOldResource|Response|Application|ResponseFactory
    {
        if ($model = $this->orderCardOldService->orderCardOldRepository->getById($id)) {
            return new OrderCardOldResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
