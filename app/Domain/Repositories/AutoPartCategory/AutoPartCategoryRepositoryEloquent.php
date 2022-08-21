<?php

namespace App\Domain\Repositories\AutoPartCategory;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\AutoPartCategory;

class AutoPartCategoryRepositoryEloquent implements AutoPartCategoryRepositoryInterface
{
    use MainRepositoryEloquent;

    protected AutoPartCategory $model;

    public function __construct(AutoPartCategory $autoPartCategory)
    {
        $this->model    =   $autoPartCategory;
    }
}
