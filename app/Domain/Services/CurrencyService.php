<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Currency\CurrencyRepositoryInterface;

class CurrencyService extends MainService
{
    public CurrencyRepositoryInterface $currencyRepository;
    public function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencyRepository   =   $currencyRepository;
    }
}
