<?php

namespace App\Domain\Services;

use App\Domain\Repositories\TransactionToNonExistingUser\TransactionToNonExistingUserRepositoryInterface;

class TransactionToNonExistingUserService extends MainService
{
    public TransactionToNonExistingUserRepositoryInterface $transactionToNonExistingUserRepository;
    public function __construct(TransactionToNonExistingUserRepositoryInterface $transactionToNonExistingUserRepository)
    {
        $this->transactionToNonExistingUserRepository   =   $transactionToNonExistingUserRepository;
    }
}
