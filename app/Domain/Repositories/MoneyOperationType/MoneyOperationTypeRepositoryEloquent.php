<?php

namespace App\Domain\Repositories\MoneyOperationType;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\MoneyOperationType;

class MoneyOperationTypeRepositoryEloquent implements MoneyOperationTypeRepositoryInterface
{
    use MainRepositoryEloquent;

    protected MoneyOperationType $model;

    public function __construct(MoneyOperationType $moneyOperationType)
    {
        $this->model    =   $moneyOperationType;
    }
}
