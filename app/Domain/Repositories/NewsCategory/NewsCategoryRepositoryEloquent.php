<?php

namespace App\Domain\Repositories\NewsCategory;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\NewsCategory;

class NewsCategoryRepositoryEloquent implements NewsCategoryRepositoryInterface
{
    use MainRepositoryEloquent;

    protected NewsCategory $model;

    public function __construct(NewsCategory $newsCategory)
    {
        $this->model    =   $newsCategory;
    }
}
