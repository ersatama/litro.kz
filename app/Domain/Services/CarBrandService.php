<?php

namespace App\Domain\Services;

use App\Domain\Repositories\CarBrand\CarBrandRepositoryInterface;

class CarBrandService
{
    protected CarBrandRepositoryInterface $carBrandRepository;
    public function __construct(CarBrandRepositoryInterface $carBrandRepository)
    {
        $this->carBrandRepository   =   $carBrandRepository;
    }

    public function get()
    {
        return $this->carBrandRepository->get();
    }

}
