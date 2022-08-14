<?php

namespace App\Domain\Repositories\CarCategory;

use App\Models\CarCategory;

class CarCategoryRepositoryEloquent implements CarCategoryRepositoryInterface
{

    public function count($where)
    {
        return CarCategory::where($where)->count();
    }

    public function get($skip,$take)
    {
        return CarCategory::skip($skip)->take($take)->get();
    }
}
