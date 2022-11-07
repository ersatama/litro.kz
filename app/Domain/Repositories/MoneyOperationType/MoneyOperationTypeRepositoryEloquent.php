<?php

namespace App\Domain\Repositories\MoneyOperationType;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\MoneyOperationType;

class MoneyOperationTypeRepositoryEloquent implements MoneyOperationTypeRepositoryInterface
{
    use RepositoryEloquent;

    protected MoneyOperationType $model;

    public function __construct(MoneyOperationType $moneyOperationType)
    {
        $this->model    =   $moneyOperationType;
    }
}
