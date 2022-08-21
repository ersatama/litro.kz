<?php

namespace App\Domain\Repositories\CarModel;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\CarModel;

class CarModelRepositoryEloquent implements CarModelRepositoryInterface
{
    use MainRepositoryEloquent;

    protected CarModel $model;

    public function __construct(CarModel $carModel)
    {
        $this->model    =   $carModel;
    }
}
