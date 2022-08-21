<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Service\ServiceRepositoryInterface;

class ServiceService
{
    public ServiceRepositoryInterface $serviceRepository;
    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository    =   $serviceRepository;
    }
}
