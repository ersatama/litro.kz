<?php

namespace App\Domain\Services;

use App\Domain\Repositories\ServiceLimit\ServiceLimitRepositoryInterface;

class ServiceLimitService
{
    public ServiceLimitRepositoryInterface $serviceLimitRepository;
    public function __construct(ServiceLimitRepositoryInterface $serviceLimitRepository)
    {
        $this->serviceLimitRepository   =   $serviceLimitRepository;
    }
}
