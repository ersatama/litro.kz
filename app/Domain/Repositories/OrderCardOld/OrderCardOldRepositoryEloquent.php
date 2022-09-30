<?php

namespace App\Domain\Repositories\OrderCardOld;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\OrderCardOld;

class OrderCardOldRepositoryEloquent implements OrderCardOldRepositoryInterface
{
    use MainRepositoryEloquent;
    protected OrderCardOld $model;
    public function __construct(OrderCardOld $orderCardOld)
    {
        $this->model    =   $orderCardOld;
    }
}
