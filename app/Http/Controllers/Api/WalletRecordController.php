<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\WalletRecordService;
use App\Http\Controllers\Controller;
use App\Http\Resources\WalletRecord\WalletRecordCollection;
use App\Http\Resources\WalletRecord\WalletRecordResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WalletRecordController extends Controller
{
    protected WalletRecordService $walletRecordService;
    public function __construct(WalletRecordService $walletRecordService)
    {
        $this->walletRecordService  =   $walletRecordService;
    }

    /**
     * Получить список - WalletRecord
     *
     * @group WalletRecord - БумажникЗапись
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->walletRecordService->walletRecordRepository->count([]),
            MainContract::DATA  =>  new WalletRecordCollection($this->walletRecordService->walletRecordRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через WalletID - WalletRecord
     *
     * @group WalletRecord - БумажникЗапись
     */
    public function getByWalletId($walletId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->walletRecordService->walletRecordRepository->count([
                MainContract::WALLET_ID   =>  $walletId
            ]),
            MainContract::DATA  =>  new WalletRecordCollection($this->walletRecordService->walletRecordRepository->getByWalletId($walletId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через PaymentID - WalletRecord
     *
     * @group WalletRecord - БумажникЗапись
     */
    public function getByPaymentId($paymentId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->walletRecordService->walletRecordRepository->count([
                MainContract::PAYMENT_ID    =>  $paymentId
            ]),
            MainContract::DATA  =>  new WalletRecordCollection($this->walletRecordService->walletRecordRepository->getByPaymentId($paymentId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - WalletRecord
     *
     * @group WalletRecord - БумажникЗапись
     */
    public function getById($id): Response|WalletRecordResource|Application|ResponseFactory
    {
        if ($model = $this->walletRecordService->walletRecordRepository->getById($id)) {
            return new WalletRecordResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
