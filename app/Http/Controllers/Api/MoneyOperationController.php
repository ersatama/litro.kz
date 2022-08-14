<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\MainContract;
use App\Domain\Services\MoneyOperationService;
use App\Http\Controllers\Controller;
use App\Http\Resources\MoneyOperation\MoneyOperationCollection;
use App\Http\Resources\MoneyOperation\MoneyOperationResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MoneyOperationController extends Controller
{
    protected MoneyOperationService $moneyOperationService;
    public function __construct(MoneyOperationService $moneyOperationService)
    {
        $this->moneyOperationService    =   $moneyOperationService;
    }

    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::INFO  =>  [
                MainContract::SKIP  =>  $skip,
                MainContract::TAKE  =>  $take,
                MainContract::COUNT =>  $this->moneyOperationService->count([])
            ],
            MainContract::DATA  =>  new MoneyOperationCollection($this->moneyOperationService->get($skip,$take))
        ],200);
    }

    public function getById($id): MoneyOperationResource|Response|Application|ResponseFactory
    {
        if ($moneyOperation = $this->moneyOperationService->getById($id)) {
            return new MoneyOperationResource($moneyOperation);
        }
        return response([MainContract::MESSAGE  =>  'MoneyOperation not found'],404);
    }

}
