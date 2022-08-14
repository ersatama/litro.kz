<?php

namespace App\Domain\Repositories\AutoPartParamOption;

use App\Models\AutoPartParamOption;

class AutoPartParamOptionRepositoryEloquent implements AutoPartParamOptionRepositoryInterface
{
    public function count($where)
    {
        return AutoPartParamOption::where($where)->count();
    }

    public function get($skip,$take)
    {
        return AutoPartParamOption::skip($skip)->take($take)->get();
    }
}
