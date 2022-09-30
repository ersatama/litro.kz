<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\Contract;
use App\Domain\Services\NewsCategoryService;
use App\Http\Controllers\Controller;
use App\Http\Resources\NewsCategory\NewsCategoryCollection;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class NewsCategoryController extends Controller
{
    protected NewsCategoryService $newsCategoryService;
    public function __construct(NewsCategoryService $newsCategoryService)
    {
        $this->newsCategoryService  =   $newsCategoryService;
    }

    /**
     * Получить список - NewsCategory
     *
     * @group NewsCategory - НовостиКатегория
     */
    public function get($skip,$take): Response|Application|ResponseFactory
    {
        return response([
            Contract::COUNT =>  $this->newsCategoryService->newsCategoryRepository->count([]),
            Contract::DATA  =>  new NewsCategoryCollection($this->newsCategoryService->newsCategoryRepository->get($skip,$take))
        ],200);
    }
}
