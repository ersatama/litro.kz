<?php

namespace App\Domain\Repositories\AutoPartType;

use App\Models\AutoPartType;

class AutoPartTypeRepositoryEloquent implements AutoPartTypeRepositoryInterface
{

    public function count($where)
    {
        return AutoPartType::where($where)->count();
    }

    public function get($skip,$take)
    {
        return AutoPartType::skip($skip)->take($take)->get();
    }
}
