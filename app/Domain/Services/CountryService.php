<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Country\CountryRepositoryInterface;

class CountryService
{
    protected CountryRepositoryInterface $countryRepository;
    public function __construct(CountryRepositoryInterface $countryRepository)
    {
        $this->countryRepository    =   $countryRepository;
    }

    public function get($skip,$take)
    {
        return $this->countryRepository->get($skip,$take);
    }

    public function count($where)
    {
        return $this->countryRepository->count($where);
    }

}
