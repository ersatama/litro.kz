<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ErrorContract;
use App\Domain\Services\ServiceImageService;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceImage\ServiceImageCollection;
use App\Http\Resources\ServiceImage\ServiceImageResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceImageController extends Controller
{
    protected ServiceImageService $serviceImageService;
    public function __construct(ServiceImageService $serviceImageService)
    {
        $this->serviceImageService  =   $serviceImageService;
    }

    /**
     * Получить список - ServiceImage
     *
     * @group ServiceImage
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->serviceImageService->serviceImageRepository->count([]),
            Contract::DATA  =>  new ServiceImageCollection($this->serviceImageService->serviceImageRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ServiceID - ServiceImage
     *
     * @group ServiceImage
     */
    public function getByServiceId($serviceId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->serviceImageService->serviceImageRepository->count([
                Contract::SERVICE_ID  =>  $serviceId
            ]),
            Contract::DATA  =>  new ServiceImageCollection($this->serviceImageService->serviceImageRepository->getByServiceId($serviceId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - ServiceImage
     *
     * @group ServiceImage
     */
    public function getById($id): Response|ServiceImageResource|Application|ResponseFactory
    {
        if ($model = $this->serviceImageService->serviceImageRepository->getById($id)) {
            return new ServiceImageResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
