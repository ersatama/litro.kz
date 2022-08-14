<?php

namespace App\Domain\Repositories\ServicePrice;

use App\Domain\Contracts\MainContract;
use App\Models\ServicePrice;

class ServicePriceRepositoryEloquent implements ServicePriceRepositoryInterface
{
    public function get($skip,$take)
    {
        return ServicePrice::skip($skip)->take($take)->get();
    }

    public function getById($id)
    {
        return ServicePrice::where(MainContract::ID,$id)->first();
    }

    public function count($where)
    {
        return ServicePrice::where($where)->count();
    }

}
