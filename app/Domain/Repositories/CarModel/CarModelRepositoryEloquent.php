<?php

namespace App\Domain\Repositories\CarModel;

use App\Domain\Contracts\MainContract;
use App\Models\CarModel;

class CarModelRepositoryEloquent implements CarModelRepositoryInterface
{

    public function count($where)
    {
        return CarModel::where($where)->count();
    }

    public function get($skip,$take)
    {
        return CarModel::skip($skip)->take($take)->get();
    }

    public function getById($id)
    {
        return CarModel::where(MainContract::ID,$id)->first();
    }

    public function getByCarBrandId($carBrandId,$skip,$take)
    {
        return CarModel::where(MainContract::CAR_BRAND_ID,$carBrandId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

}
