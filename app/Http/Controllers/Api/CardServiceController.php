<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\CardServiceService;
use App\Http\Controllers\Controller;
use App\Http\Resources\CardService\CardServiceCollection;
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

    /**
     * Получить список - CardService
     *
     * @group CardService - КарточкаСервис
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->cardServiceService->cardServiceRepository->count([]),
            Contract::DATA  =>  new CardServiceCollection($this->cardServiceService->cardServiceRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через CardID - CardService
     *
     * @group CardService - КарточкаСервис
     */
    public function getByCardId($cardId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->cardServiceService->cardServiceRepository->count([Contract::CARD_ID => $cardId]),
            Contract::DATA  =>  new CardServiceCollection($this->cardServiceService->cardServiceRepository->getByCardId($cardId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ServiceID - CardService
     *
     * @group CardService - КарточкаСервис
     */
    public function getByServiceId($serviceId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->cardServiceService->cardServiceRepository->count([Contract::SERVICE_ID => $serviceId]),
            Contract::DATA  =>  new CardServiceCollection($this->cardServiceService->cardServiceRepository->getByServiceId($serviceId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - CardService
     *
     * @group CardService - КарточкаСервис
     */
    public function getById($id): Response|CardServiceResource|Application|ResponseFactory
    {
        if ($carModel = $this->cardServiceService->cardServiceRepository->getById($id)) {
            return new CardServiceResource($carModel);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
