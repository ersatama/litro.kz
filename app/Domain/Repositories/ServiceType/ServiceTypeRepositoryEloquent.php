<?php

namespace App\Domain\Repositories\ServiceType;

use App\Domain\Contracts\MainContract;
use App\Models\ServiceType;

class ServiceTypeRepositoryEloquent implements ServiceTypeRepositoryInterface
{

    public function count($where)
    {
        return ServiceType::where($where)->count();
    }

    public function get($skip,$take)
    {
        return ServiceType::skip($skip)->take($take)->get();
    }

    public function getById($id)
    {
        return ServiceType::where(MainContract::ID,$id)->first();
    }

}
