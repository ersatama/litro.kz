<?php

namespace App\Domain\Repositories\Car;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\Car;

class CarRepositoryEloquent implements CarRepositoryInterface
{
    use RepositoryEloquent;

    protected Car $model;

    public function __construct(Car $car)
    {
        $this->model    =   $car;
    }
}
