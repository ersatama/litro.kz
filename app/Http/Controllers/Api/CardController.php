<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\CardService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Card\CardCollection;
use App\Http\Resources\Card\CardResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CardController extends Controller
{
    protected CardService $cardService;
    public function __construct(CardService $cardService)
    {
        $this->cardService  =   $cardService;
    }

    public function getByUserId($userId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::INFO  =>  [
                MainContract::SKIP  =>  $skip,
                MainContract::TAKE  =>  $take,
                MainContract::COUNT =>  $this->cardService->count([
                    MainContract::USER_ID   =>  $userId
                ]),
            ],
            MainContract::DATA  =>  new CardCollection($this->cardService->getByUserId($userId,$skip,$take))
        ],200);
    }

    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::INFO  =>  [
                MainContract::SKIP  =>  $skip,
                MainContract::TAKE  =>  $take,
                MainContract::COUNT =>  $this->cardService->count([]),
            ],
            MainContract::DATA  =>  new CardCollection($this->cardService->get($skip,$take))
        ],200);
    }

    public function getById($id): Response|CardResource|Application|ResponseFactory
    {
        if ($serviceLimit = $this->cardService->getById($id)) {
            return new CardResource($serviceLimit);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
