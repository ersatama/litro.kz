<?php

namespace App\Domain\Repositories\Currency;

use App\Models\Currency;

class CurrencyRepositoryEloquent implements CurrencyRepositoryInterface
{
    public function get($skip,$take)
    {
        return Currency::skip($skip)->take($take)->get();
    }

    public function count($where)
    {
        return Currency::where($where)->count();
    }

}
