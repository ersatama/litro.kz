<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\WalletService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Wallet\WalletCollection;
use App\Http\Resources\Wallet\WalletResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WalletController extends Controller
{
    protected WalletService $walletService;
    public function __construct(WalletService $walletService)
    {
        $this->walletService    =   $walletService;
    }

    /**
     * Получить список - Wallet
     *
     * @group Wallet - Бумажник
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->walletService->walletRepository->count([]),
            Contract::DATA  =>  new WalletCollection($this->walletService->walletRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через UserID - Wallet
     *
     * @group Wallet - Бумажник
     */
    public function getByUserId($userId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->walletService->walletRepository->count([
                Contract::USER_ID   =>  $userId
            ]),
            Contract::DATA  =>  new WalletCollection($this->walletService->walletRepository->getByUserId($userId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - Wallet
     *
     * @group Wallet - Бумажник
     */
    public function getById($id): Response|WalletResource|Application|ResponseFactory
    {
        if ($model = $this->walletService->walletRepository->getById($id)) {
            return new WalletResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
