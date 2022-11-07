<?php

namespace App\Domain\Services;

use App\Domain\Repositories\ServicePrice\ServicePriceRepositoryInterface;

class ServicePriceService
{
    public ServicePriceRepositoryInterface $servicePriceRepository;
    public function __construct(ServicePriceRepositoryInterface $servicePriceRepository)
    {
        $this->servicePriceRepository   =   $servicePriceRepository;
    }
}
