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

    public function get()
    {
        return $this->currencyRepository->get();
    }

}
