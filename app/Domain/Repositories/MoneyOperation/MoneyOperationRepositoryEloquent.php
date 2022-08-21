<?php

namespace App\Domain\Repositories\MoneyOperation;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\MoneyOperation;

class MoneyOperationRepositoryEloquent implements MoneyOperationRepositoryInterface
{
    use MainRepositoryEloquent;
    protected MoneyOperation $model;
    public function __construct(MoneyOperation $moneyOperation)
    {
        $this->model    =   $moneyOperation;
    }
}
