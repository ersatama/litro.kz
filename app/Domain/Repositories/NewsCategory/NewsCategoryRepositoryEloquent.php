<?php

namespace App\Domain\Repositories\NewsCategory;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\NewsCategory;

class NewsCategoryRepositoryEloquent implements NewsCategoryRepositoryInterface
{
    use RepositoryEloquent;

    protected NewsCategory $model;

    public function __construct(NewsCategory $newsCategory)
    {
        $this->model    =   $newsCategory;
    }
}
