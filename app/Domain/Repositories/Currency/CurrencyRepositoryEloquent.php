<?php

namespace App\Domain\Repositories\Currency;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\Currency;

class CurrencyRepositoryEloquent implements CurrencyRepositoryInterface
{
    use RepositoryEloquent;

    protected Currency $model;

    public function __construct(Currency $currency)
    {
        $this->model    =   $currency;
    }
}
