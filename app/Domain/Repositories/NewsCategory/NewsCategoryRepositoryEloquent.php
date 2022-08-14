<?php

namespace App\Domain\Repositories\NewsCategory;

use App\Models\NewsCategory;

class NewsCategoryRepositoryEloquent implements NewsCategoryRepositoryInterface
{
    public function count($where)
    {
        return NewsCategory::where($where)->count();
    }

    public function get($skip,$take)
    {
        return NewsCategory::skip($skip)->take($take)->get();
    }
}
