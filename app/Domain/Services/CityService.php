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

    public function get($skip,$take)
    {
        return $this->cityRepository->get($skip,$take);
    }

    public function count($where)
    {
        return $this->cityRepository->count($where);
    }

}
