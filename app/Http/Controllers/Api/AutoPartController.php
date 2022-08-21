<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\AutoPartService;
use App\Http\Controllers\Controller;
use App\Http\Resources\AutoPart\AutoPartCollection;
use App\Http\Resources\AutoPart\AutoPartResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AutoPartController extends Controller
{
    protected AutoPartService $autoPartService;
    public function __construct(AutoPartService $autoPartService)
    {
        $this->autoPartService  =   $autoPartService;
    }

    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->autoPartService->autoPartRepository->count([]),
            MainContract::DATA  =>  new AutoPartCollection($this->autoPartService->autoPartRepository->get($skip,$take))
        ],200);
    }

    public function getById($id): Response|AutoPartResource|Application|ResponseFactory
    {
        if ($serviceLimit = $this->autoPartService->autoPartRepository->getById($id)) {
            return new AutoPartResource($serviceLimit);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
