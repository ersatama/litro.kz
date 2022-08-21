<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\MainContract;
use App\Domain\Services\AutoPartTypeService;
use App\Http\Controllers\Controller;
use App\Http\Resources\AutoPartType\AutoPartTypeCollection;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AutoPartTypeController extends Controller
{
    protected AutoPartTypeService $autoPartTypeService;
    public function __construct(AutoPartTypeService $autoPartTypeService)
    {
        $this->autoPartTypeService  =   $autoPartTypeService;
    }

    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::COUNT =>  $this->autoPartTypeService->autoPartTypeRepository->count([]),
            MainContract::DATA  =>  new AutoPartTypeCollection($this->autoPartTypeService->autoPartTypeRepository->get($skip,$take))
        ],200);
    }

}
