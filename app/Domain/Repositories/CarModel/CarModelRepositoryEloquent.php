<?php

namespace App\Domain\Repositories\CarModel;

use App\Domain\Contracts\MainContract;
use App\Models\CarModel;

class CarModelRepositoryEloquent implements CarModelRepositoryInterface
{
    public function get()
    {
        return CarModel::get();
    }

    public function getById($id)
    {
        return CarModel::where(MainContract::ID,$id)->first();
    }

    public function getByBrandId($brandId)
    {
        return CarModel::where(MainContract::CAR_BRAND_ID,$brandId)->get();
    }

}
