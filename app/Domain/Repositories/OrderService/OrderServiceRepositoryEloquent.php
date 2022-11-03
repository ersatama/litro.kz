<?php

namespace App\Domain\Repositories\OrderService;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\OrderService;

class OrderServiceRepositoryEloquent implements OrderServiceRepositoryInterface
{
    use RepositoryEloquent;
    protected OrderService $model;
    public function __construct(OrderService $orderService)
    {
        $this->model    =   $orderService;
    }

    public static function count()
    {
        return OrderService::count();
    }
}
