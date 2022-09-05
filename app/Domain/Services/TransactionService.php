<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Transaction\TransactionRepositoryInterface;

class TransactionService extends MainService
{
    public TransactionRepositoryInterface $transactionRepository;
    public function __construct(TransactionRepositoryInterface $transactionRepository)
    {
        $this->transactionRepository    =   $transactionRepository;
    }
}
