<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ErrorContract;
use App\Domain\Services\PartnerPurchaseService;
use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerPurchase\PartnerPurchaseCollection;
use App\Http\Resources\PartnerPurchase\PartnerPurchaseResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PartnerPurchaseController extends Controller
{
    protected PartnerPurchaseService $partnerPurchaseService;
    public function __construct(PartnerPurchaseService $partnerPurchaseService)
    {
        $this->partnerPurchaseService   =   $partnerPurchaseService;
    }

    /**
     * Получить список - PartnerPurchase
     *
     * @group PartnerPurchase
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->partnerPurchaseService->partnerPurchaseRepository->count([]),
            Contract::DATA  =>  new PartnerPurchaseCollection($this->partnerPurchaseService->partnerPurchaseRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через PartnerID - PartnerPurchase
     *
     * @group PartnerPurchase
     */
    public function getByPartnerId($partnerId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->partnerPurchaseService->partnerPurchaseRepository->count([
                Contract::PARTNER_ID    =>  $partnerId
            ]),
            Contract::DATA  =>  new PartnerPurchaseCollection($this->partnerPurchaseService->partnerPurchaseRepository->getByPartnerId($partnerId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - PartnerPurchase
     *
     * @group PartnerPurchase
     */
    public function getById($id): PartnerPurchaseResource|Response|Application|ResponseFactory
    {
        if ($model = $this->partnerPurchaseService->partnerPurchaseRepository->getById($id)) {
            return new PartnerPurchaseResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
