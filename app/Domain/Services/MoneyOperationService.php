<?php

namespace App\Domain\Services;

use App\Domain\Repositories\MoneyOperation\MoneyOperationRepositoryInterface;

class MoneyOperationService
{
    public MoneyOperationRepositoryInterface $moneyOperationRepository;
    public function __construct(MoneyOperationRepositoryInterface $moneyOperationRepository)
    {
        $this->moneyOperationRepository =   $moneyOperationRepository;
    }
}
