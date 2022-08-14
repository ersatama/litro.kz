<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Currency\CurrencyRepositoryInterface;

class CurrencyService
{
    protected CurrencyRepositoryInterface $currencyRepository;
    public function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencyRepository   =   $currencyRepository;
    }

    public function get($skip,$take)
    {
        return $this->currencyRepository->get($skip,$take);
    }

    public function count($where)
    {
        return $this->currencyRepository->count($where);
    }

}
