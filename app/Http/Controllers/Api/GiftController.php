<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\GiftService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Gift\GiftCollection;
use App\Http\Resources\Gift\GiftResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GiftController extends Controller
{
    protected GiftService $giftService;
    public function __construct(GiftService $giftService)
    {
        $this->giftService  =   $giftService;
    }

    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->giftService->giftRepository->count([]),
            MainContract::DATA  =>  new GiftCollection($this->giftService->giftRepository->get($skip,$take))
        ],200);
    }

    public function getByUserId($userId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->giftService->giftRepository->count([
                MainContract::USER_ID   =>  $userId
            ]),
            MainContract::DATA  =>  new GiftCollection($this->giftService->giftRepository->getByUserId($userId,$skip,$take))
        ],200);
    }

    public function getByCardId($cardId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->giftService->giftRepository->count([
                MainContract::CARD_ID   =>  $cardId
            ]),
            MainContract::DATA  =>  new GiftCollection($this->giftService->giftRepository->getByCardId($cardId,$skip,$take))
        ],200);
    }

    public function getById($id): Response|GiftResource|Application|ResponseFactory
    {
        if ($gift = $this->giftService->giftRepository->getById($id)) {
            return new GiftResource($gift);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}