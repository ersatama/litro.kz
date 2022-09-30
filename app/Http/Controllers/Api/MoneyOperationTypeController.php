<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\MoneyOperationTypeService;
use App\Http\Controllers\Controller;
use App\Http\Resources\MoneyOperationType\MoneyOperationTypeCollection;
use App\Http\Resources\MoneyOperationType\MoneyOperationTypeResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MoneyOperationTypeController extends Controller
{
    protected MoneyOperationTypeService $moneyOperationTypeService;
    public function __construct(MoneyOperationTypeService $moneyOperationTypeService)
    {
        $this->moneyOperationTypeService    =   $moneyOperationTypeService;
    }

    /**
     * Получить список - MoneyOperationType
     *
     * @group MoneyOperationType - ДеньгиОперацияТип
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->moneyOperationTypeService->moneyOperationTypeRepository->count([]),
            Contract::DATA  =>  new MoneyOperationTypeCollection($this->moneyOperationTypeService->moneyOperationTypeRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - MoneyOperationType
     *
     * @group MoneyOperationType - ДеньгиОперацияТип
     */
    public function getById($id): Response|MoneyOperationTypeResource|Application|ResponseFactory
    {
        if ($moneyOperationType = $this->moneyOperationTypeService->moneyOperationTypeRepository->getById($id)) {
            return new MoneyOperationTypeResource($moneyOperationType);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
