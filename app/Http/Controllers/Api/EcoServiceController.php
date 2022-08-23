<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\EcoServiceService;
use App\Http\Controllers\Controller;
use App\Http\Resources\EcoService\EcoServiceCollection;
use App\Http\Resources\EcoService\EcoServiceResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EcoServiceController extends Controller
{
    protected EcoServiceService $ecoServiceService;
    public function __construct(EcoServiceService $ecoServiceService)
    {
        $this->ecoServiceService    =   $ecoServiceService;
    }

    /**
     * Получить список - EcoService
     *
     * @group EcoService - ЭкоСервис
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->ecoServiceService->ecoServiceRepository->count([]),
            MainContract::DATA  =>  new EcoServiceCollection($this->ecoServiceService->ecoServiceRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - EcoService
     *
     * @group EcoService - ЭкоСервис
     */
    public function getById($id): Response|ResponseFactory|Application|EcoServiceResource
    {
        if ($ecoService = $this->ecoServiceService->ecoServiceRepository->getById($id)) {
            return new EcoServiceResource($ecoService);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
