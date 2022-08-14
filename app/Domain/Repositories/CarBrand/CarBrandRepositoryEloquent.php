<?php

namespace App\Domain\Repositories\CarBrand;

use App\Models\CarBrand;

class CarBrandRepositoryEloquent implements CarBrandRepositoryInterface
{
    public function get($skip,$take)
    {
        return CarBrand::skip($skip)->take($take)->get();
    }

    public function count($where)
    {
        return CarBrand::where($where)->count();
    }

}
