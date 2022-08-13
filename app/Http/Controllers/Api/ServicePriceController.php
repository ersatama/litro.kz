<?php

namespace App\Http\Controllers\Api;

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

    public function get(): ServicePriceCollection
    {
        return new ServicePriceCollection($this->servicePriceService->get());
    }

    public function getById($id): ServicePriceResource|Response|Application|ResponseFactory
    {
        if ($servicePrice = $this->servicePriceService->getById($id)) {
            return new ServicePriceResource($servicePrice);
        }
        return response(['message'  =>  'ServicePrice not found'],404);
    }
}
