<?php

namespace App\Domain\Repositories\CarModelAveragePrice;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\CarModelAveragePrice;

class CarModelAveragePriceRepositoryEloquent implements CarModelAveragePriceRepositoryInterface
{
    use MainRepositoryEloquent;

    protected CarModelAveragePrice $model;

    public function __construct(CarModelAveragePrice $carModelAveragePrice)
    {
        $this->model    =   $carModelAveragePrice;
    }
}
