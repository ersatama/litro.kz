<?php

namespace App\Domain\Repositories\City;

use App\Models\City;

class CityRepositoryEloquent implements CityRepositoryInterface
{
    public function get($skip,$take)
    {
        return City::skip($skip)->take($take)->get();
    }

    public function count($where)
    {
        return City::where($where)->count();
    }
}
