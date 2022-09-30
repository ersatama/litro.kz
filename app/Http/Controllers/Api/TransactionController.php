<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\TransactionService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Transaction\TransactionCollection;
use App\Http\Resources\Transaction\TransactionResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionController extends Controller
{
    protected TransactionService $transactionService;
    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService   =   $transactionService;
    }

    /**
     * Получить список - Transaction
     *
     * @group Transaction - Транзакции
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->transactionService->transactionRepository->count([]),
            Contract::DATA  =>  new TransactionCollection($this->transactionService->transactionRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - Transaction
     *
     * @group Transaction - Транзакции
     */
    public function getById($id): Response|TransactionResource|Application|ResponseFactory
    {
        if ($model = $this->transactionService->transactionRepository->getById($id)) {
            return new TransactionResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
