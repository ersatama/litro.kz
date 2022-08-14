<?php

namespace App\Domain\Repositories\Service;

use App\Domain\Contracts\MainContract;
use App\Models\Service;

class ServiceRepositoryEloquent implements ServiceRepositoryInterface
{
    public function count($where)
    {
        return Service::where($where)->count();
    }

    public function get($skip,$take)
    {
        return Service::skip($skip)->take($take)->get();
    }

    public function getById($id)
    {
        return Service::where(MainContract::ID,$id)->first();
    }

}
