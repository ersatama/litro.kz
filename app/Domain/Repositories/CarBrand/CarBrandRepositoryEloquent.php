<?php

namespace App\Domain\Repositories\CarBrand;

use App\Models\CarBrand;

class CarBrandRepositoryEloquent implements CarBrandRepositoryInterface
{
    public function get()
    {
        return CarBrand::get();
    }
}
