<?php

namespace App\Domain\Services;

use App\Domain\Repositories\CarModel\CarModelRepositoryInterface;

class CarModelService
{
    protected CarModelRepositoryInterface $carModelRepository;
    public function __construct(CarModelRepositoryInterface $carModelRepository)
    {
        $this->carModelRepository   =   $carModelRepository;
    }

    public function get()
    {
        return $this->carModelRepository->get();
    }

    public function getById($id)
    {
        return $this->carModelRepository->getById($id);
    }

    public function getByBrandId($brandId)
    {
        return $this->carModelRepository->getByBrandId($brandId);
    }

}
