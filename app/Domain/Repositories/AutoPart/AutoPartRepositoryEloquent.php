<?php

namespace App\Domain\Repositories\AutoPart;

use App\Domain\Contracts\MainContract;
use App\Models\AutoPart;

class AutoPartRepositoryEloquent implements AutoPartRepositoryInterface
{
    public function count($where)
    {
        return AutoPart::where($where)->count();
    }

    public function get($skip,$take)
    {
        return AutoPart::skip($skip)->take($take)->get();
    }

    public function getById($id)
    {
        return AutoPart::where(MainContract::ID,$id)->first();
    }

}
