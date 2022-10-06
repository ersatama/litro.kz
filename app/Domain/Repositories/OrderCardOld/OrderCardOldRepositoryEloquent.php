<?php

namespace App\Domain\Repositories\OrderCardOld;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\OrderCardOld;

class OrderCardOldRepositoryEloquent implements OrderCardOldRepositoryInterface
{
    use RepositoryEloquent;
    protected OrderCardOld $model;
    public function __construct(OrderCardOld $orderCardOld)
    {
        $this->model    =   $orderCardOld;
    }
}
