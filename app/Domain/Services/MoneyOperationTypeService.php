<?php

namespace App\Domain\Services;

use App\Domain\Repositories\MoneyOperationType\MoneyOperationTypeRepositoryInterface;

class MoneyOperationTypeService
{
    protected MoneyOperationTypeRepositoryInterface $moneyOperationTypeRepository;
    public function __construct(MoneyOperationTypeRepositoryInterface $moneyOperationTypeRepository)
    {
        $this->moneyOperationTypeRepository =   $moneyOperationTypeRepository;
    }

    public function get($skip,$take)
    {
        return $this->moneyOperationTypeRepository->get($skip,$take);
    }

    public function count($where)
    {
        return $this->moneyOperationTypeRepository->count($where);
    }

    public function getById($id)
    {
        return $this->moneyOperationTypeRepository->getById($id);
    }

}
