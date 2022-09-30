<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\SPartnerReceivedServiceService;
use App\Http\Controllers\Controller;
use App\Http\Resources\SPartnerReceivedService\SPartnerReceivedServiceCollection;
use App\Http\Resources\SPartnerReceivedService\SPartnerReceivedServiceResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SPartnerReceivedServiceController extends Controller
{
    protected SPartnerReceivedServiceService $SPartnerReceivedServiceService;
    public function __construct(SPartnerReceivedServiceService $SPartnerReceivedServiceService)
    {
        $this->SPartnerReceivedServiceService   =   $SPartnerReceivedServiceService;
    }

    /**
     * Получить список - SPartnerReceivedService
     *
     * @group SPartnerReceivedService
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->SPartnerReceivedServiceService->SPartnerReceivedServiceRepository->count([]),
            Contract::DATA  =>  new SPartnerReceivedServiceCollection($this->SPartnerReceivedServiceService->SPartnerReceivedServiceRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через UserID - SPartnerReceivedService
     *
     * @group SPartnerReceivedService
     */
    public function getByUserId($userId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->SPartnerReceivedServiceService->SPartnerReceivedServiceRepository->count([
                Contract::USER_ID   =>  $userId
            ]),
            Contract::DATA  =>  new SPartnerReceivedServiceCollection($this->SPartnerReceivedServiceService->SPartnerReceivedServiceRepository->getByUserId($userId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - SPartnerReceivedService
     *
     * @group SPartnerReceivedService
     */
    public function getById($id): Response|SPartnerReceivedServiceResource|Application|ResponseFactory
    {
        if ($model = $this->SPartnerReceivedServiceService->SPartnerReceivedServiceRepository->getById($id)) {
            return new SPartnerReceivedServiceResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
