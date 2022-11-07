<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\PartnerService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Partner\PartnerCollection;
use App\Http\Resources\Partner\PartnerResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PartnerController extends Controller
{
    protected PartnerService $partnerService;
    public function __construct(PartnerService $partnerService)
    {
        $this->partnerService   =   $partnerService;
    }

    /**
     * Получить список - Partner
     *
     * @group Partner - Партнер
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->partnerService->partnerRepository->count([]),
            Contract::DATA  =>  new PartnerCollection($this->partnerService->partnerRepository->get($skip,$take))
        ],200);
    }


    /**
     * Получить данные через ID - Partner
     *
     * @group Partner - Партнер
     */
    public function getById($id): Response|PartnerResource|Application|ResponseFactory
    {
        if ($model = $this->partnerService->partnerRepository->getById($id)) {
            return new PartnerResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
