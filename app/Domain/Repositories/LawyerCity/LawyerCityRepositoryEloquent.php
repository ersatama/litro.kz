<?php

namespace App\Domain\Repositories\LawyerCity;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\LawyerCity;

class LawyerCityRepositoryEloquent implements LawyerCityRepositoryInterface
{
    use MainRepositoryEloquent;
    protected LawyerCity $model;
    public function __construct(LawyerCity $lawyerCity)
    {
        $this->model    =   $lawyerCity;
    }
}
