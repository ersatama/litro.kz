<?php

namespace App\Domain\Repositories\OrderService;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\OrderService;

class OrderServiceRepositoryEloquent implements OrderServiceRepositoryInterface
{
    use MainRepositoryEloquent;
    protected OrderService $model;
    public function __construct(OrderService $orderService)
    {
        $this->model    =   $orderService;
    }
}
