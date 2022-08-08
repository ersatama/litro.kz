<?php

namespace App\Http\Controllers\Api;

use App\Domain\Services\AutoPartCategoryService;
use App\Http\Controllers\Controller;
use App\Http\Resources\AutoPartCategory\AutoPartCategoryCollection;
use Illuminate\Http\Request;

class AutoPartCategoryController extends Controller
{
    protected AutoPartCategoryService $autoPartCategoryService;
    public function __construct(AutoPartCategoryService $autoPartCategoryService)
    {
        $this->autoPartCategoryService  =   $autoPartCategoryService;
    }

    public function get(): AutoPartCategoryCollection
    {
        return new AutoPartCategoryCollection($this->autoPartCategoryService->get());
    }
}
