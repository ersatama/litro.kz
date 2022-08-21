<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\CardServiceService;
use App\Http\Controllers\Controller;
use App\Http\Resources\CardRange\CardRangeCollection;
use App\Http\Resources\CardService\CardServiceResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CardServiceController extends Controller
{
    protected CardServiceService $cardServiceService;
    public function __construct(CardServiceService $cardServiceService)
    {
        $this->cardServiceService   =   $cardServiceService;
    }

    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->cardServiceService->cardServiceRepository->count([]),
            MainContract::DATA  =>  new CardRangeCollection($this->cardServiceService->cardServiceRepository->get($skip,$take))
        ],200);
    }

    public function getByCardId($cardId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->cardServiceService->cardServiceRepository->count([MainContract::CARD_ID => $cardId]),
            MainContract::DATA  =>  new CardRangeCollection($this->cardServiceService->cardServiceRepository->getByCardId($cardId,$skip,$take))
        ],200);
    }

    public function getByServiceId($serviceId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->cardServiceService->cardServiceRepository->count([MainContract::SERVICE_ID => $serviceId]),
            MainContract::DATA  =>  new CardRangeCollection($this->cardServiceService->cardServiceRepository->getByServiceId($serviceId,$skip,$take))
        ],200);
    }

    public function getById($id): Response|CardServiceResource|Application|ResponseFactory
    {
        if ($carModel = $this->cardServiceService->cardServiceRepository->getById($id)) {
            return new CardServiceResource($carModel);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
