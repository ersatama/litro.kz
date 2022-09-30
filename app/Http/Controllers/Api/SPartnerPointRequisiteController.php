<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\SPartnerPointRequisiteService;
use App\Http\Controllers\Controller;
use App\Http\Resources\SPartnerPointRequisite\SPartnerPointRequisiteCollection;
use App\Http\Resources\SPartnerPointRequisite\SPartnerPointRequisiteResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SPartnerPointRequisiteController extends Controller
{
    protected SPartnerPointRequisiteService $SPartnerPointRequisiteService;
    public function __construct(SPartnerPointRequisiteService $SPartnerPointRequisiteService)
    {
        $this->SPartnerPointRequisiteService    =   $SPartnerPointRequisiteService;
    }

    /**
     * Получить список - SPartnerPointRequisite
     *
     * @group SPartnerPointRequisite
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->SPartnerPointRequisiteService->SPartnerPointRequisiteRepository->count([]),
            Contract::DATA  =>  new SPartnerPointRequisiteCollection($this->SPartnerPointRequisiteService->SPartnerPointRequisiteRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через SPartnerPointID - SPartnerPointRequisite
     *
     * @group SPartnerPointRequisite
     */
    public function getBySPartnerPointId($sPartnerPointId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->SPartnerPointRequisiteService->SPartnerPointRequisiteRepository->count([
                Contract::S_PARTNER_POINT_ID    =>  $sPartnerPointId
            ]),
            Contract::DATA  =>  new SPartnerPointRequisiteCollection($this->SPartnerPointRequisiteService->SPartnerPointRequisiteRepository->getBySPartnerPointId($sPartnerPointId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - SPartnerPointRequisite
     *
     * @group SPartnerPointRequisite
     */
    public function getById($id): Response|SPartnerPointRequisiteResource|Application|ResponseFactory
    {
        if ($model = $this->SPartnerPointRequisiteService->SPartnerPointRequisiteRepository->getById($id)) {
            return new SPartnerPointRequisiteResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
