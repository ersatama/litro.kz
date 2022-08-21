<?php

namespace App\Domain\Repositories\CarBrand;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\CarBrand;

class CarBrandRepositoryEloquent implements CarBrandRepositoryInterface
{
    use MainRepositoryEloquent;

    protected CarBrand $model;
    
    public function __construct(CarBrand $carBrand)
    {
        $this->model    =   $carBrand;
    }
}
