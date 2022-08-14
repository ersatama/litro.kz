<?php

namespace App\Domain\Repositories\Country;

use App\Models\Country;

class CountryRepositoryEloquent implements CountryRepositoryInterface
{
    public function get($skip,$take)
    {
        return Country::skip($skip)->take($take)->get();
    }

    public function count($where)
    {
        return Country::where($where)->count();
    }

}
