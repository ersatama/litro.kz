<?php

namespace App\Domain\Repositories\CarCategory;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\CarCategory;

class CarCategoryRepositoryEloquent implements CarCategoryRepositoryInterface
{
    use MainRepositoryEloquent;

    protected CarCategory $model;

    public function __construct(CarCategory $carCategory)
    {
        $this->model    =   $carCategory;
    }
}
