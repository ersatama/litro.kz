<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\CardRangeService;
use App\Http\Controllers\Controller;
use App\Http\Resources\CardRange\CardRangeCollection;
use App\Http\Resources\CardRange\CardRangeResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CardRangeController extends Controller
{
    protected CardRangeService $cardRangeService;
    public function __construct(CardRangeService $cardRangeService)
    {
        $this->cardRangeService =   $cardRangeService;
    }

    /**
     * Получить список - CardRange
     *
     * @group CardRange - КарточкаДиапазон
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->cardRangeService->cardRangeRepository->count([]),
            MainContract::DATA  =>  new CardRangeCollection($this->cardRangeService->cardRangeRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через CardID - CardRange
     *
     * @group CardRange - КарточкаДиапазон
     */
    public function getByCardId($cardId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->cardRangeService->cardRangeRepository->count([MainContract::CARD_ID => $cardId]),
            MainContract::DATA  =>  new CardRangeCollection($this->cardRangeService->cardRangeRepository->getByCardId($cardId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через CityID - CardRange
     *
     * @group CardRange - КарточкаДиапазон
     */
    public function getByCityId($cityId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->cardRangeService->cardRangeRepository->count([MainContract::CITY_ID => $cityId]),
            MainContract::DATA  =>  new CardRangeCollection($this->cardRangeService->cardRangeRepository->getByCityId($cityId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - CardRange
     *
     * @group CardRange - КарточкаДиапазон
     */
    public function getById($id): Response|CardRangeResource|Application|ResponseFactory
    {
        if ($carModel = $this->cardRangeService->cardRangeRepository->getById($id)) {
            return new CardRangeResource($carModel);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
