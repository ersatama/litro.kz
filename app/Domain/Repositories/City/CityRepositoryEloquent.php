<?php

namespace App\Domain\Repositories\City;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\City;

class CityRepositoryEloquent implements CityRepositoryInterface
{
    use MainRepositoryEloquent;

    protected City $model;

    public function __construct(City $city)
    {
        $this->model    =   $city;
    }
}
