<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\ServicePriceService;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServicePrice\ServicePriceCollection;
use App\Http\Resources\ServicePrice\ServicePriceResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServicePriceController extends Controller
{
    protected ServicePriceService $servicePriceService;
    public function __construct(ServicePriceService $servicePriceService)
    {
        $this->servicePriceService  =   $servicePriceService;
    }

    /**
     * Получить список - ServicePrice
     *
     * @group ServicePrice - СервисЦена
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->servicePriceService->servicePriceRepository->count([]),
            Contract::DATA  =>  new ServicePriceCollection($this->servicePriceService->servicePriceRepository->get($skip,$take)),
        ],200);
    }

    /**
     * Получить данные через ID - ServicePrice
     *
     * @group ServicePrice - СервисЦена
     */
    public function getById($id): ServicePriceResource|Response|Application|ResponseFactory
    {
        if ($servicePrice = $this->servicePriceService->servicePriceRepository->getById($id)) {
            return new ServicePriceResource($servicePrice);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
