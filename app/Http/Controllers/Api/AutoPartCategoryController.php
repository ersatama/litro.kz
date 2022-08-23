<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\MainContract;
use App\Domain\Services\AutoPartCategoryService;
use App\Http\Controllers\Controller;
use App\Http\Resources\AutoPartCategory\AutoPartCategoryCollection;
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
            MainContract::COUNT =>  $this->autoPartCategoryService->autoPartCategoryRepository->count([]),
            MainContract::DATA  =>  new AutoPartCategoryCollection($this->autoPartCategoryService->autoPartCategoryRepository->get($skip,$take))
        ],200);
    }
}
