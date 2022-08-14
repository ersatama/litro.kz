<?php

namespace App\Domain\Services;

use App\Domain\Repositories\MoneyOperation\MoneyOperationRepositoryInterface;

class MoneyOperationService
{
    protected MoneyOperationRepositoryInterface $moneyOperationRepository;
    public function __construct(MoneyOperationRepositoryInterface $moneyOperationRepository)
    {
        $this->moneyOperationRepository =   $moneyOperationRepository;
    }

    public function get($skip,$take)
    {
        return $this->moneyOperationRepository->get($skip,$take);
    }

    public function count($where)
    {
        return $this->moneyOperationRepository->count($where);
    }

    public function getById($id)
    {
        return $this->moneyOperationRepository->getById($id);
    }

}
