<?php

namespace App\Domain\Repositories\NewsCategory;

use App\Models\NewsCategory;

class NewsCategoryRepositoryEloquent implements NewsCategoryRepositoryInterface
{
    public function get()
    {
        return NewsCategory::get();
    }
}
