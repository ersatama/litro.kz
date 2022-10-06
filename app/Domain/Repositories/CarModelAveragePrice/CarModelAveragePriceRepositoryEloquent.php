<?php

namespace App\Domain\Repositories\CarModelAveragePrice;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\CarModelAveragePrice;

class CarModelAveragePriceRepositoryEloquent implements CarModelAveragePriceRepositoryInterface
{
    use RepositoryEloquent;

    protected CarModelAveragePrice $model;

    public function __construct(CarModelAveragePrice $carModelAveragePrice)
    {
        $this->model    =   $carModelAveragePrice;
    }
}
