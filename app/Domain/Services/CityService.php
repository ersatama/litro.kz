<?php

namespace App\Domain\Services;

use App\Domain\Repositories\City\CityRepositoryInterface;

class CityService
{
    protected CityRepositoryInterface $cityRepository;
    public function __construct(CityRepositoryInterface $cityRepository)
    {
        $this->cityRepository   =   $cityRepository;
    }

    public function get()
    {
        return $this->cityRepository->get();
    }

}
