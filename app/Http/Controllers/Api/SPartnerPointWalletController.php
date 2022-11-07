<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\SPartnerPointWalletService;
use App\Http\Controllers\Controller;
use App\Http\Resources\SPartnerPointWallet\SPartnerPointWalletCollection;
use App\Http\Resources\SPartnerPointWallet\SPartnerPointWalletResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SPartnerPointWalletController extends Controller
{
    protected SPartnerPointWalletService $SPartnerPointWalletService;
    public function __construct(SPartnerPointWalletService $SPartnerPointWalletService)
    {
        $this->SPartnerPointWalletService   =   $SPartnerPointWalletService;
    }

    /**
     * Получить список - SPartnerPointWallet
     *
     * @group SPartnerPointWallet
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->SPartnerPointWalletService->SPartnerPointWalletRepository->count([]),
            Contract::DATA  =>  new SPartnerPointWalletCollection($this->SPartnerPointWalletService->SPartnerPointWalletRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через SPartnerPointID - SPartnerPointWallet
     *
     * @group SPartnerPointWallet
     */
    public function getBySPartnerPointId($sPartnerPointId,$skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->SPartnerPointWalletService->SPartnerPointWalletRepository->count([
                Contract::S_PARTNER_POINT_ID    =>  $sPartnerPointId
            ]),
            Contract::DATA  =>  new SPartnerPointWalletCollection($this->SPartnerPointWalletService->SPartnerPointWalletRepository->getBySPartnerPointId($sPartnerPointId,$skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - SPartnerPointWallet
     *
     * @group SPartnerPointWallet
     */
    public function getById($id): Response|SPartnerPointWalletResource|Application|ResponseFactory
    {
        if ($model = $this->SPartnerPointWalletService->SPartnerPointWalletRepository->getById($id)) {
            return new SPartnerPointWalletResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
