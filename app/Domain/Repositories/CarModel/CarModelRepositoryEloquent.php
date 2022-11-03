<?php

namespace App\Domain\Repositories\CarModel;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\CarModel;

class CarModelRepositoryEloquent implements CarModelRepositoryInterface
{
    use RepositoryEloquent;

    protected CarModel $model;

    public function __construct(CarModel $carModel)
    {
        $this->model    =   $carModel;
    }

    public static function count()
    {
        return CarModel::count();
    }
}
