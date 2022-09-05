<?php

namespace App\Domain\Repositories\TransactionToNonExistingUser;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\TransactionToNonExistingUser;

class TransactionToNonExistingUserRepositoryEloquent implements TransactionToNonExistingUserRepositoryInterface
{
    use MainRepositoryEloquent;
    protected TransactionToNonExistingUser $model;
    public function __construct(TransactionToNonExistingUser $transactionToNonExistingUser)
    {
        $this->model    =   $transactionToNonExistingUser;
    }
}
