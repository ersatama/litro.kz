<?php

namespace App\Domain\Repositories\Country;

use App\Models\Country;

class CountryRepositoryEloquent implements CountryRepositoryInterface
{
    public function get()
    {
        return Country::get();
    }
}
