<?php

namespace App\Domain\Services;

use App\Domain\Repositories\City\CityRepositoryInterface;

class CityService
{
    public CityRepositoryInterface $cityRepository;
    public function __construct(CityRepositoryInterface $cityRepository)
    {
        $this->cityRepository   =   $cityRepository;
    }
}
