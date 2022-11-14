<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ErrorContract;
use App\Domain\Services\RepeatedPartnerGiftCardService;
use App\Http\Controllers\Controller;
use App\Http\Resources\RepeatedPartnerGiftCard\RepeatedPartnerGiftCardCollection;
use App\Http\Resources\RepeatedPartnerGiftCard\RepeatedPartnerGiftCardResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RepeatedPartnerGiftCardController extends Controller
{
    protected RepeatedPartnerGiftCardService $repeatedPartnerGiftCardService;
    public function __construct(RepeatedPartnerGiftCardService $repeatedPartnerGiftCardService)
    {
        $this->repeatedPartnerGiftCardService   =   $repeatedPartnerGiftCardService;
    }

    /**
     * Получить список - RepeatedPartnerGiftCard
     *
     * @group RepeatedPartnerGiftCard
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->repeatedPartnerGiftCardService->repeatedPartnerGiftCardRepository->count([]),
            Contract::DATA  =>  new RepeatedPartnerGiftCardCollection($this->repeatedPartnerGiftCardService->repeatedPartnerGiftCardRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через CardID - RepeatedPartnerGiftCard
     *
     * @group RepeatedPartnerGiftCard
     */
    public function getByCardId($cardId, $skip, $take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->repeatedPartnerGiftCardService->repeatedPartnerGiftCardRepository->count([
                Contract::CARD_ID   =>  $cardId
            ]),
            Contract::DATA  =>  new RepeatedPartnerGiftCardCollection($this->repeatedPartnerGiftCardService->repeatedPartnerGiftCardRepository->getByCardId($cardId, $skip, $take))
        ],200);
    }

    /**
     * Получить данные через PartnerId - RepeatedPartnerGiftCard
     *
     * @group RepeatedPartnerGiftCard
     */
    public function getByPartnerId($partnerId, $skip, $take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->repeatedPartnerGiftCardService->repeatedPartnerGiftCardRepository->count([
                Contract::PARTNER_ID    =>  $partnerId
            ]),
            Contract::DATA  =>  new RepeatedPartnerGiftCardCollection($this->repeatedPartnerGiftCardService->repeatedPartnerGiftCardRepository->getByCardId($partnerId, $skip, $take))
        ],200);
    }

    /**
     * Получить данные через ID - RepeatedPartnerGiftCard
     *
     * @group RepeatedPartnerGiftCard
     */
    public function getById($id): Response|RepeatedPartnerGiftCardResource|Application|ResponseFactory
    {
        if ($orderService = $this->repeatedPartnerGiftCardService->repeatedPartnerGiftCardRepository->getById($id)) {
            return new RepeatedPartnerGiftCardResource($orderService);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
