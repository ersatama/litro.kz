<?php

namespace App\Domain\Repositories\City;

use App\Models\City;

class CityRepositoryEloquent implements CityRepositoryInterface
{
    public function get()
    {
        return City::get();
    }
}
