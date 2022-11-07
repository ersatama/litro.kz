<?php

namespace App\Domain\Repositories\AutoPartCategory;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\AutoPartCategory;

class AutoPartCategoryRepositoryEloquent implements AutoPartCategoryRepositoryInterface
{
    use RepositoryEloquent;

    protected AutoPartCategory $model;

    public function __construct(AutoPartCategory $autoPartCategory)
    {
        $this->model    =   $autoPartCategory;
    }
}
