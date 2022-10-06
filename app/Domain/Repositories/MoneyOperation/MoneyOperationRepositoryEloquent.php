<?php

namespace App\Domain\Repositories\MoneyOperation;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\MoneyOperation;

class MoneyOperationRepositoryEloquent implements MoneyOperationRepositoryInterface
{
    use RepositoryEloquent;
    protected MoneyOperation $model;
    public function __construct(MoneyOperation $moneyOperation)
    {
        $this->model    =   $moneyOperation;
    }
}
