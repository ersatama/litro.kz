<?php

namespace App\Domain\Services;

use App\Domain\Repositories\CarModelAveragePrice\CarModelAveragePriceRepositoryInterface;

class CarModelAveragePriceService extends MainService
{
    public CarModelAveragePriceRepositoryInterface $carModelAveragePriceRepository;
    public function __construct(CarModelAveragePriceRepositoryInterface $carModelAveragePriceRepository)
    {
        $this->carModelAveragePriceRepository   =   $carModelAveragePriceRepository;
    }
}
