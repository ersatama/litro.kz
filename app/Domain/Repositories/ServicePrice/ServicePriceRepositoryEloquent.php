<?php

namespace App\Domain\Repositories\ServicePrice;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\ServicePrice;

class ServicePriceRepositoryEloquent implements ServicePriceRepositoryInterface
{
    use RepositoryEloquent;

    protected ServicePrice $model;

    public function __construct(ServicePrice $servicePrice)
    {
        $this->model    =   $servicePrice;
    }
}
