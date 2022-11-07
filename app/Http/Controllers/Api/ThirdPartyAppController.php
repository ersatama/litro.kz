<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\Contract;
use App\Domain\Services\ThirdPartyAppService;
use App\Http\Controllers\Controller;
use App\Http\Resources\ThirdPartyApp\ThirdPartyAppCollection;
use App\Http\Resources\ThirdPartyApp\ThirdPartyAppResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ThirdPartyAppController extends Controller
{
    protected ThirdPartyAppService $thirdPartyAppService;
    public function __construct(ThirdPartyAppService $thirdPartyAppService)
    {
        $this->thirdPartyAppService =   $thirdPartyAppService;
    }

    /**
     * Получить список - ThirdPartyApp
     *
     * @group ThirdPartyApp - Стороннее приложение
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->thirdPartyAppService->thirdPartyAppRepository->count([]),
            Contract::DATA  =>  new ThirdPartyAppCollection($this->thirdPartyAppService->thirdPartyAppRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - ThirdPartyApp
     *
     * @group ThirdPartyApp - Стороннее приложение
     */
    public function getById($id): Response|ThirdPartyAppResource|Application|ResponseFactory
    {
        if ($model = $this->thirdPartyAppService->thirdPartyAppRepository->getById($id)) {
            return new ThirdPartyAppResource($model);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
