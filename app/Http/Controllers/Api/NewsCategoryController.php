<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\MainContract;
use App\Domain\Services\NewsCategoryService;
use App\Http\Controllers\Controller;
use App\Http\Resources\NewsCategory\NewsCategoryCollection;

class NewsCategoryController extends Controller
{
    protected NewsCategoryService $newsCategoryService;
    public function __construct(NewsCategoryService $newsCategoryService)
    {
        $this->newsCategoryService  =   $newsCategoryService;
    }

    public function get($skip,$take)
    {
        return response([
            MainContract::INFO  =>  [
                MainContract::SKIP  =>  $skip,
                MainContract::TAKE  =>  $take,
                MainContract::COUNT =>  $this->newsCategoryService->count([]),
            ],
            MainContract::DATA  =>  new NewsCategoryCollection($this->newsCategoryService->get($skip,$take))
        ],200);
    }

}
