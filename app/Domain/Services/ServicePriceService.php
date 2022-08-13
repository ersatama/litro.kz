<?php

namespace App\Domain\Services;

use App\Domain\Repositories\ServicePrice\ServicePriceRepositoryInterface;

class ServicePriceService
{
    protected ServicePriceRepositoryInterface $servicePriceRepository;
    public function __construct(ServicePriceRepositoryInterface $servicePriceRepository)
    {
        $this->servicePriceRepository   =   $servicePriceRepository;
    }

    public function get()
    {
        return $this->servicePriceRepository->get();
    }

    public function getById($id)
    {
        return $this->servicePriceRepository->getById($id);
    }
}
