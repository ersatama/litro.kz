<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\DriverService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Driver\DriverCollection;
use App\Http\Resources\Driver\DriverResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DriverController extends Controller
{
    protected DriverService $driverService;
    public function __construct(DriverService $driverService)
    {
        $this->driverService    =   $driverService;
    }

    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->driverService->driverRepository->count([]),
            MainContract::DATA  =>  new DriverCollection($this->driverService->driverRepository->get($skip,$take))
        ],200);
    }

    public function getByOrderCardId($orderCardId): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->driverService->driverRepository->count([
                MainContract::ORDER_CARD_ID =>  $orderCardId
            ]),
            MainContract::DATA  =>  new DriverCollection($this->driverService->driverRepository->getByOrderCardId($orderCardId))
        ],200);
    }

    public function getById($id): Response|DriverResource|Application|ResponseFactory
    {
        if ($driver = $this->driverService->driverRepository->getById($id)) {
            return new DriverResource($driver);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
