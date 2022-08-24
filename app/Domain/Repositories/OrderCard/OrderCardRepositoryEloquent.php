<?php

namespace App\Domain\Repositories\OrderCard;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\OrderCard;

class OrderCardRepositoryEloquent implements OrderCardRepositoryInterface
{
    use MainRepositoryEloquent;
    protected OrderCard $model;
    public function __construct(OrderCard $orderCard)
    {
        $this->model    =   $orderCard;
    }
}
