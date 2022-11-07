<?php

namespace App\Domain\Services;

use App\Domain\Repositories\MoneyOperationType\MoneyOperationTypeRepositoryInterface;

class MoneyOperationTypeService
{
    public MoneyOperationTypeRepositoryInterface $moneyOperationTypeRepository;
    public function __construct(MoneyOperationTypeRepositoryInterface $moneyOperationTypeRepository)
    {
        $this->moneyOperationTypeRepository =   $moneyOperationTypeRepository;
    }
}
