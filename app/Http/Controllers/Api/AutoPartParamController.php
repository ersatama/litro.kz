<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ErrorContract;
use App\Domain\Services\AutoPartParamService;
use App\Http\Controllers\Controller;
use App\Http\Resources\AutoPartParam\AutoPartParamCollection;
use App\Http\Resources\AutoPartParam\AutoPartParamResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AutoPartParamController extends Controller
{
    protected AutoPartParamService $autoPartParamService;
    public function __construct(AutoPartParamService $autoPartParamService)
    {
        $this->autoPartParamService =   $autoPartParamService;
    }

    /**
     * Получить список - AutoPartParam
     *
     * @group AutoPartParam - АвтомобильЗапчастиПараметры
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->autoPartParamService->autoPartParamRepository->count([]),
            Contract::DATA  =>  new AutoPartParamCollection($this->autoPartParamService->autoPartParamRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - AutoPartParam
     *
     * @group AutoPartParam - АвтомобильЗапчастиПараметры
     */
    public function getById($id): Response|AutoPartParamResource|Application|ResponseFactory
    {
        if ($serviceLimit = $this->autoPartParamService->autoPartParamRepository->getById($id)) {
            return new AutoPartParamResource($serviceLimit);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
