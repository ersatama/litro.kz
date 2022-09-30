<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\TransactionToNonExistingUserService;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionToNonExistingUser\TransactionToNonExistingUserCollection;
use App\Http\Resources\TransactionToNonExistingUser\TransactionToNonExistingUserResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionToNonExistingUserController extends Controller
{
    protected TransactionToNonExistingUserService $transactionToNonExistingUserService;
    public function __construct(TransactionToNonExistingUserService $transactionToNonExistingUserService)
    {
        $this->transactionToNonExistingUserService  =   $transactionToNonExistingUserService;
    }

    /**
     * Получить список - TransactionToNonExistingUser
     *
     * @group TransactionToNonExistingUser - Транзакция для несуществующего пользователя
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->transactionToNonExistingUserService->transactionToNonExistingUserRepository->count([]),
            Contract::DATA  =>  new TransactionToNonExistingUserCollection($this->transactionToNonExistingUserService->transactionToNonExistingUserRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - TransactionToNonExistingUser
     *
     * @group TransactionToNonExistingUser - Транзакция для несуществующего пользователя
     */
    public function getById($id): Response|TransactionToNonExistingUserResource|Application|ResponseFactory
    {
        if ($model = $this->transactionToNonExistingUserService->transactionToNonExistingUserRepository->getById($id)) {
            return new TransactionToNonExistingUserResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
