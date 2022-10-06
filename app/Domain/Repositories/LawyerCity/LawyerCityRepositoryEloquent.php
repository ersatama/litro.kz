<?php

namespace App\Domain\Repositories\LawyerCity;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\LawyerCity;

class LawyerCityRepositoryEloquent implements LawyerCityRepositoryInterface
{
    use RepositoryEloquent;
    protected LawyerCity $model;
    public function __construct(LawyerCity $lawyerCity)
    {
        $this->model    =   $lawyerCity;
    }
}
