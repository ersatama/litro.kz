<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
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

    /**
     * Получить список - MoneyOperation
     *
     * @group MoneyOperation - ДеньгиОперация
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->moneyOperationService->moneyOperationRepository->count([]),
            Contract::DATA  =>  new MoneyOperationCollection($this->moneyOperationService->moneyOperationRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - MoneyOperation
     *
     * @group MoneyOperation - ДеньгиОперация
     */
    public function getById($id): MoneyOperationResource|Response|Application|ResponseFactory
    {
        if ($moneyOperation = $this->moneyOperationService->moneyOperationRepository->getById($id)) {
            return new MoneyOperationResource($moneyOperation);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
