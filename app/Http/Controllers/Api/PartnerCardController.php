<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ErrorContract;
use App\Domain\Services\PartnerCardService;
use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerCard\PartnerCardCollection;
use App\Http\Resources\PartnerCard\PartnerCardResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PartnerCardController extends Controller
{
    protected PartnerCardService $partnerCardService;
    public function __construct(PartnerCardService $partnerCardService)
    {
        $this->partnerCardService   =   $partnerCardService;
    }

    /**
     * Получить список - PartnerCard
     *
     * @group PartnerCard
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->partnerCardService->partnerCardRepository->count([]),
            Contract::DATA  =>  new PartnerCardCollection($this->partnerCardService->partnerCardRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через CardID - PartnerCard
     *
     * @group PartnerCard
     */
    public function getByCardId($cardId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->partnerCardService->partnerCardRepository->count([
                Contract::CARD_ID   =>  $cardId
            ]),
            Contract::DATA  =>  new PartnerCardCollection($this->partnerCardService->partnerCardRepository->getByCardId($cardId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через PartnerID - PartnerCard
     *
     * @group PartnerCard
     */
    public function getByPartnerId($partnerId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->partnerCardService->partnerCardRepository->count([
                Contract::PARTNER_ID    =>  $partnerId
            ]),
            Contract::DATA  =>  new PartnerCardCollection($this->partnerCardService->partnerCardRepository->getByPartnerId($partnerId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - PartnerCard
     *
     * @group PartnerCard
     */
    public function getById($id): PartnerCardResource|Response|Application|ResponseFactory
    {
        if ($model = $this->partnerCardService->partnerCardRepository->getById($id)) {
            return new PartnerCardResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
