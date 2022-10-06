<?php

namespace App\Domain\Repositories\OrderServiceService;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\OrderServiceService;

class OrderServiceServiceRepositoryEloquent implements OrderServiceServiceRepositoryInterface
{
    use RepositoryEloquent;
    protected OrderServiceService $model;
    public function __construct(OrderServiceService $orderServiceService)
    {
        $this->model    =   $orderServiceService;
    }
}
