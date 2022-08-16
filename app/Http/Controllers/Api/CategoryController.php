<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\ErrorContract;
use App\Domain\Contracts\MainContract;
use App\Domain\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryCollection;
use App\Http\Resources\Category\CategoryResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService  =   $categoryService;
    }

    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            MainContract::INFO  =>  [
                MainContract::SKIP  =>  $skip,
                MainContract::TAKE  =>  $take,
                MainContract::COUNT =>  $this->categoryService->count([]),
            ],
            MainContract::DATA  =>  new CategoryCollection($this->categoryService->get($skip,$take))
        ],200);
    }

    public function getById($id): Response|CategoryResource|Application|ResponseFactory
    {
        if ($category = $this->categoryService->getById($id)) {
            return new CategoryResource($category);
        }
        return response(ErrorContract::ERROR_NOT_FOUND,404);
    }

}
