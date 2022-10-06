<?php

namespace App\Domain\Repositories\OrderCard;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\OrderCard;

class OrderCardRepositoryEloquent implements OrderCardRepositoryInterface
{
    use RepositoryEloquent;
    protected OrderCard $model;
    public function __construct(OrderCard $orderCard)
    {
        $this->model    =   $orderCard;
    }
}
