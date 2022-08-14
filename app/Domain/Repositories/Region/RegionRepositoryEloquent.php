<?php

namespace App\Domain\Repositories\Region;

use App\Models\Region;

class RegionRepositoryEloquent implements RegionRepositoryInterface
{
    public function get($skip,$take)
    {
        return Region::skip($skip)->take($take)->get();
    }

    public function count($where)
    {
        return Region::where($where)->count();
    }

}
