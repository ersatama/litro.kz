<?php

namespace App\Domain\Repositories\CarBrand;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\CarBrand;

class CarBrandRepositoryEloquent implements CarBrandRepositoryInterface
{
    use RepositoryEloquent;

    protected CarBrand $model;

    public function __construct(CarBrand $carBrand)
    {
        $this->model    =   $carBrand;
    }

    public static function count()
    {
        return CarBrand::count();
    }
}
