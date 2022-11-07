<?php

namespace App\Domain\Services;

use App\Domain\Repositories\CarBrand\CarBrandRepositoryInterface;

class CarBrandService extends MainService
{
    public CarBrandRepositoryInterface $carBrandRepository;
    public function __construct(CarBrandRepositoryInterface $carBrandRepository)
    {
        $this->carBrandRepository   =   $carBrandRepository;
    }
}
