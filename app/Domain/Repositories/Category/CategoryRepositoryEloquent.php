<?php

namespace App\Domain\Repositories\Category;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\Category;

class CategoryRepositoryEloquent implements CategoryRepositoryInterface
{
    use MainRepositoryEloquent;

    protected Category $model;

    public function __construct(Category $category)
    {
        $this->model    =   $category;
    }
}
