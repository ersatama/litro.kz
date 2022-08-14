<?php

namespace App\Domain\Repositories\AutoPartCategory;

use App\Models\AutoPartCategory;

class AutoPartCategoryRepositoryEloquent implements AutoPartCategoryRepositoryInterface
{
    public function count($where)
    {
        return AutoPartCategory::where($where)->count();
    }

    public function get($skip,$take)
    {
        return AutoPartCategory::skip($skip)->take($take)->get();
    }
}
