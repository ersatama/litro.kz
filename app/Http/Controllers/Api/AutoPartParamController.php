<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\MainContract;
use App\Domain\Services\AutoPartParamService;
use App\Http\Controllers\Controller;
use App\Http\Resources\AutoPartParam\AutoPartParamCollection;
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

    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->autoPartParamService->autoPartParamRepository->count([]),
            MainContract::DATA  =>  new AutoPartParamCollection($this->autoPartParamService->autoPartParamRepository->get($skip,$take))
        ],200);
    }

}
