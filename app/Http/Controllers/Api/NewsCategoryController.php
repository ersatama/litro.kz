<?php

namespace App\Http\Controllers\Api;

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

    public function get(): NewsCategoryCollection
    {
        return new NewsCategoryCollection($this->newsCategoryService->get());
    }

}
