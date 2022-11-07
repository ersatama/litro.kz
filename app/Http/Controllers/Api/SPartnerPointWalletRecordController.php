<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\SPartnerPointWalletRecordService;
use App\Http\Controllers\Controller;
use App\Http\Resources\SPartnerPointWalletRecord\SPartnerPointWalletRecordCollection;
use App\Http\Resources\SPartnerPointWalletRecord\SPartnerPointWalletRecordResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SPartnerPointWalletRecordController extends Controller
{
    protected SPartnerPointWalletRecordService $SPartnerPointWalletRecordService;
    public function __construct(SPartnerPointWalletRecordService $SPartnerPointWalletRecordService)
    {
        $this->SPartnerPointWalletRecordService =   $SPartnerPointWalletRecordService;
    }

    /**
     * Получить список - SPartnerPointWalletRecord
     *
     * @group SPartnerPointWalletRecord
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->SPartnerPointWalletRecordService->SPartnerPointWalletRecordRepository->count([]),
            Contract::DATA  =>  new SPartnerPointWalletRecordCollection($this->SPartnerPointWalletRecordService->SPartnerPointWalletRecordRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через SPartnerPointID - SPartnerPointWalletRecord
     *
     * @group SPartnerPointWalletRecord
     */
    public function getBySPartnerPointWalletId($sPartnerPointWalletId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->SPartnerPointWalletRecordService->SPartnerPointWalletRecordRepository->count([
                Contract::S_PARTNER_POINT_WALLET_ID    =>  $sPartnerPointWalletId
            ]),
            Contract::DATA  =>  new SPartnerPointWalletRecordCollection($this->SPartnerPointWalletRecordService->SPartnerPointWalletRecordRepository->getBySPartnerPointWalletId($sPartnerPointWalletId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - SPartnerPointWalletRecord
     *
     * @group SPartnerPointWalletRecord
     */
    public function getById($id): Response|SPartnerPointWalletRecordResource|Application|ResponseFactory
    {
        if ($model = $this->SPartnerPointWalletRecordService->SPartnerPointWalletRecordRepository->getById($id)) {
            return new SPartnerPointWalletRecordResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
