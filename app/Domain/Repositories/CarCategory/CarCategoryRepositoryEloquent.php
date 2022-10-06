<?php

namespace App\Domain\Repositories\CarCategory;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\CarCategory;

class CarCategoryRepositoryEloquent implements CarCategoryRepositoryInterface
{
    use RepositoryEloquent;

    protected CarCategory $model;

    public function __construct(CarCategory $carCategory)
    {
        $this->model    =   $carCategory;
    }
}
