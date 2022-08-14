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

    public function get($skip,$take)
    {
        return $this->servicePriceRepository->get($skip,$take);
    }

    public function getById($id)
    {
        return $this->servicePriceRepository->getById($id);
    }

    public function count($where)
    {
        return $this->servicePriceRepository->count($where);
    }

}
