<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\MainContract;
use App\Domain\Services\AutoPartParamOptionService;
use App\Http\Controllers\Controller;
use App\Http\Resources\AutoPartParamOption\AutoPartParamOptionCollection;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AutoPartParamOptionController extends Controller
{
    protected AutoPartParamOptionService $autoPartParamOptionService;
    public function __construct(AutoPartParamOptionService $autoPartParamOptionService)
    {
        $this->autoPartParamOptionService   =   $autoPartParamOptionService;
    }

    /**
     * Получить список - AutoPartParamOption
     *
     * @group AutoPartParamOption - АвтомобильЗапчастиПараметрыОпции
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->autoPartParamOptionService->autoPartParamOptionRepository->count([]),
            MainContract::DATA  =>  new AutoPartParamOptionCollection($this->autoPartParamOptionService->autoPartParamOptionRepository->get($skip,$take))
        ],200);
    }

}
