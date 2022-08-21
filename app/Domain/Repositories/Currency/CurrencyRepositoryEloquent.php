<?php

namespace App\Domain\Repositories\Currency;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\Currency;

class CurrencyRepositoryEloquent implements CurrencyRepositoryInterface
{
    use MainRepositoryEloquent;

    protected Currency $model;

    public function __construct(Currency $currency)
    {
        $this->model    =   $currency;
    }
}
