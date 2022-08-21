<?php

namespace App\Domain\Repositories\ServicePrice;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\ServicePrice;

class ServicePriceRepositoryEloquent implements ServicePriceRepositoryInterface
{
    use MainRepositoryEloquent;

    protected ServicePrice $model;

    public function __construct(ServicePrice $servicePrice)
    {
        $this->model    =   $servicePrice;
    }
}
