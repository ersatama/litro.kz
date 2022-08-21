<?php

namespace App\Domain\Services;

use App\Domain\Repositories\CarModel\CarModelRepositoryInterface;

class CarModelService extends MainService
{
    public CarModelRepositoryInterface $carModelRepository;
    public function __construct(CarModelRepositoryInterface $carModelRepository)
    {
        $this->carModelRepository   =   $carModelRepository;
    }
}
