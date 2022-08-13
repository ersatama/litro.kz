<?php

namespace App\Domain\Services;

use App\Domain\Repositories\ServiceType\ServiceTypeRepositoryInterface;

class ServiceTypeService
{
    protected ServiceTypeRepositoryInterface $serviceTypeRepository;
    public function __construct(ServiceTypeRepositoryInterface $serviceTypeRepository)
    {
        $this->serviceTypeRepository    =   $serviceTypeRepository;
    }

    public function get()
    {
        return $this->serviceTypeRepository->get();
    }

    public function getById($id)
    {
        return $this->serviceTypeRepository->getById($id);
    }

}
