<?php

namespace App\Domain\Repositories\AutoPartParam;

use App\Models\AutoPartParam;

class AutoPartParamRepositoryEloquent implements AutoPartParamRepositoryInterface
{
    public function count($where)
    {
        return AutoPartParam::where($where)->count();
    }

    public function get($skip,$take)
    {
        return AutoPartParam::skip($skip)->take($take)->get();
    }
}
