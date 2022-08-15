<?php

namespace App\Domain\Repositories\ServiceLimit;

use App\Domain\Contracts\MainContract;
use App\Models\ServiceLimit;

class ServiceLimitRepositoryEloquent implements ServiceLimitRepositoryInterface
{
    public function get($skip,$take)
    {
        return ServiceLimit::skip($skip)->take($take)->get();
    }

    public function count($where)
    {
        return ServiceLimit::where($where)->count();
    }

    public function getById($id)
    {
        return ServiceLimit::where(MainContract::ID,$id)->first();
    }
}
