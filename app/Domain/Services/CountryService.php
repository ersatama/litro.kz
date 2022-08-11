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

    public function get()
    {
        return $this->countryRepository->get();
    }

}
