<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Car\CarRepositoryInterface;

class CarService extends MainService
{
    public CarRepositoryInterface $carRepository;
    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository    =   $carRepository;
    }
}
