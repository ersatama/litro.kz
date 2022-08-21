<?php

namespace App\Domain\Repositories\Country;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\Country;

class CountryRepositoryEloquent implements CountryRepositoryInterface
{
    use MainRepositoryEloquent;

    protected Country $model;

    public function __construct(Country $country)
    {
        $this->model    =   $country;
    }
}
