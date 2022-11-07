<?php

namespace App\Domain\Repositories\OrderCardChosenService;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\OrderCardChosenService;

class OrderCardChosenServiceRepositoryEloquent implements OrderCardChosenServiceRepositoryInterface
{
    use RepositoryEloquent;
    protected OrderCardChosenService $model;
    public function __construct(OrderCardChosenService $orderCardChosenService)
    {
        $this->model    =   $orderCardChosenService;
    }
}
