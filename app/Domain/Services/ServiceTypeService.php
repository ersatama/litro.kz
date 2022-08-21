<?php

namespace App\Domain\Services;

use App\Domain\Repositories\ServiceType\ServiceTypeRepositoryInterface;

class ServiceTypeService extends MainService
{
    public ServiceTypeRepositoryInterface $serviceTypeRepository;
    public function __construct(ServiceTypeRepositoryInterface $serviceTypeRepository)
    {
        $this->serviceTypeRepository    =   $serviceTypeRepository;
    }
}
