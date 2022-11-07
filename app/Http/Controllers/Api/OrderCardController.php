<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\OrderCardService;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderCard\OrderCardCollection;
use App\Http\Resources\OrderCard\OrderCardResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderCardController extends Controller
{
    protected OrderCardService $orderCardService;
    public function __construct(OrderCardService $orderCardService)
    {
        $this->orderCardService =   $orderCardService;
    }

    /**
     * Получить список - OrderCard
     *
     * @group OrderCard - ЗаказКарточка
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->orderCardService->orderCardRepository->count([]),
            Contract::DATA  =>  new OrderCardCollection($this->orderCardService->orderCardRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через UserID - OrderCard
     *
     * @group OrderCard - ЗаказКарточка
     */
    public function getByUserId($userId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->orderCardService->orderCardRepository->count([
                Contract::USER_ID   =>  $userId
            ]),
            Contract::DATA  =>  new OrderCardCollection($this->orderCardService->orderCardRepository->getByUserId($userId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через CardID - OrderCard
     *
     * @group OrderCard - ЗаказКарточка
     */
    public function getByCardId($cardId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->orderCardService->orderCardRepository->count([
                Contract::CARD_ID   =>  $cardId
            ]),
            Contract::DATA  =>  new OrderCardCollection($this->orderCardService->orderCardRepository->getByCardId($cardId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - OrderCard
     *
     * @group OrderCard - ЗаказКарточка
     */
    public function getById($id): Response|OrderCardResource|Application|ResponseFactory
    {
        if ($orderCard = $this->orderCardService->orderCardRepository->getById($id)) {
            return new OrderCardResource($orderCard);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
