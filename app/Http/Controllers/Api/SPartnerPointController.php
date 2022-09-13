<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\SPartnerPointService;
use App\Http\Controllers\Controller;
use App\Http\Resources\SPartnerPoint\SPartnerPointCollection;
use App\Http\Resources\SPartnerPoint\SPartnerPointResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SPartnerPointController extends Controller
{
    protected SPartnerPointService $SPartnerPointService;
    public function __construct(SPartnerPointService $SPartnerPointService)
    {
        $this->SPartnerPointService =   $SPartnerPointService;
    }

    /**
     * Получить список - SPartnerPoint
     *
     * @group SPartnerPoint
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->SPartnerPointService->SPartnerPointRepository->count([]),
            MainContract::DATA  =>  new SPartnerPointCollection($this->SPartnerPointService->SPartnerPointRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - SPartnerPoint
     *
     * @group SPartnerPoint
     */
    public function getById($id): Response|SPartnerPointResource|Application|ResponseFactory
    {
        if ($model = $this->SPartnerPointService->SPartnerPointRepository->getById($id)) {
            return new SPartnerPointResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
