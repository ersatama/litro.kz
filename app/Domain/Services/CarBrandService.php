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

    public function get($skip,$take)
    {
        return $this->carBrandRepository->get($skip,$take);
    }

    public function count($where)
    {
        return $this->carBrandRepository->count($where);
    }

}
