<?php

namespace App\Domain\Repositories\Currency;

use App\Models\Currency;

class CurrencyRepositoryEloquent implements CurrencyRepositoryInterface
{
    public function get()
    {
        return Currency::get();
    }
}
