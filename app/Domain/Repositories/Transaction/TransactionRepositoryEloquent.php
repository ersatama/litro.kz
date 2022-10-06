<?php

namespace App\Domain\Repositories\Transaction;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\Transaction;

class TransactionRepositoryEloquent implements TransactionRepositoryInterface
{
    use RepositoryEloquent;
    protected Transaction $model;
    public function __construct(Transaction $transaction)
    {
        $this->model    =   $transaction;
    }
}
