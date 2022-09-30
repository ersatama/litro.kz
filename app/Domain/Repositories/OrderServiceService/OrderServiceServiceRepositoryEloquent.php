<?php

namespace App\Domain\Repositories\OrderServiceService;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\OrderServiceService;

class OrderServiceServiceRepositoryEloquent implements OrderServiceServiceRepositoryInterface
{
    use MainRepositoryEloquent;
    protected OrderServiceService $model;
    public function __construct(OrderServiceService $orderServiceService)
    {
        $this->model    =   $orderServiceService;
    }
}
