<?php

namespace App\Domain\Services;

use App\Domain\Repositories\LawyerCity\LawyerCityRepositoryInterface;

class LawyerCityService extends MainService
{
    public LawyerCityRepositoryInterface $lawyerCityRepository;
    public function __construct(LawyerCityRepositoryInterface $lawyerCityRepository)
    {
        $this->lawyerCityRepository =   $lawyerCityRepository;
    }
}
