<?php

namespace App\Domain\Repositories\Transaction;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\Transaction;

class TransactionRepositoryEloquent implements TransactionRepositoryInterface
{
    use MainRepositoryEloquent;
    protected Transaction $model;
    public function __construct(Transaction $transaction)
    {
        $this->model    =   $transaction;
    }
}
