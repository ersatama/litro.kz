<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ErrorContract;
use App\Domain\Services\AutoPartCategoryService;
use App\Http\Controllers\Controller;
use App\Http\Resources\AutoPartCategory\AutoPartCategoryCollection;
use App\Http\Resources\AutoPartCategory\AutoPartCategoryResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AutoPartCategoryController extends Controller
{
    protected AutoPartCategoryService $autoPartCategoryService;
    public function __construct(AutoPartCategoryService $autoPartCategoryService)
    {
        $this->autoPartCategoryService  =   $autoPartCategoryService;
    }

    /**
     * Получить список - AutoPartCategory
     *
     * @group AutoPartCategory - АвтомобильЗапчастиКатегория
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->autoPartCategoryService->autoPartCategoryRepository->count([]),
            Contract::DATA  =>  new AutoPartCategoryCollection($this->autoPartCategoryService->autoPartCategoryRepository->get($skip,$take))
        ],200);
    }

    /**
     * Получить данные через ID - AutoPartCategory
     *
     * @group AutoPartCategory - АвтомобильЗапчастиКатегория
     */
    public function getById($id): Response|AutoPartCategoryResource|Application|ResponseFactory
    {
        if ($serviceLimit = $this->autoPartCategoryService->autoPartCategoryRepository->getById($id)) {
            return new AutoPartCategoryResource($serviceLimit);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }
}
