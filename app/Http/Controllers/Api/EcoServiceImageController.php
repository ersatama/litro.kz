<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ErrorContract;
use App\Domain\Services\EcoServiceImageService;
use App\Http\Controllers\Controller;
use App\Http\Resources\EcoServiceImage\EcoServiceImageCollection;
use App\Http\Resources\EcoServiceImage\EcoServiceImageResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EcoServiceImageController extends Controller
{
    protected EcoServiceImageService $ecoServiceImageService;
    public function __construct(EcoServiceImageService $ecoServiceImageService)
    {
        $this->ecoServiceImageService   =   $ecoServiceImageService;
    }

    /**
     * Получить список - EcoServiceImage
     *
     * @group EcoServiceImage
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->ecoServiceImageService->ecoServiceImageRepository->count([]),
            Contract::DATA  =>  new EcoServiceImageCollection($this->ecoServiceImageService->ecoServiceImageRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ecoServiceID - EcoServiceImage
     *
     * @group EcoServiceImage
     */
    public function getByEcoServiceId($ecoServiceId, $skip, $take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->ecoServiceImageService->ecoServiceImageRepository->count([
                Contract::ECO_SERVICE_ID    =>  $ecoServiceId
            ]),
            Contract::DATA  =>  new EcoServiceImageCollection($this->ecoServiceImageService->ecoServiceImageRepository->getByEcoServiceId($ecoServiceId, $skip, $take))
        ],200);
    }

    /**
     * Получить данные через ID - EcoServiceImage
     *
     * @group EcoServiceImage
     */
    public function getById($id): EcoServiceImageResource|Response|Application|ResponseFactory
    {
        if ($ecoService = $this->ecoServiceImageService->ecoServiceImageRepository->getById($id)) {
            return new EcoServiceImageResource($ecoService);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
