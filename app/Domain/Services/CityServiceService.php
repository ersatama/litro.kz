<?php

namespace App\Domain\Services;

use App\Domain\Repositories\CityService\CityServiceRepositoryInterface;

class CityServiceService extends MainService
{
    public CityServiceRepositoryInterface $cityServiceRepository;
    public function __construct(CityServiceRepositoryInterface $cityServiceRepository)
    {
        $this->cityServiceRepository    =   $cityServiceRepository;
    }
}
