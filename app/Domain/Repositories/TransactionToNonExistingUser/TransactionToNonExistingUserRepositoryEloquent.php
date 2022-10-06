<?php

namespace App\Domain\Repositories\TransactionToNonExistingUser;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\TransactionToNonExistingUser;

class TransactionToNonExistingUserRepositoryEloquent implements TransactionToNonExistingUserRepositoryInterface
{
    use RepositoryEloquent;
    protected TransactionToNonExistingUser $model;
    public function __construct(TransactionToNonExistingUser $transactionToNonExistingUser)
    {
        $this->model    =   $transactionToNonExistingUser;
    }
}
