<?php

namespace App\Domain\Repositories\Car;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\Car;

class CarRepositoryEloquent implements CarRepositoryInterface
{
    use MainRepositoryEloquent;

    protected Car $model;

    public function __construct(Car $car)
    {
        $this->model    =   $car;
    }
}
