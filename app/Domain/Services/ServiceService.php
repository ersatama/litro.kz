<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Service\ServiceRepositoryInterface;

class ServiceService
{
    protected ServiceRepositoryInterface $serviceRepository;
    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository    =   $serviceRepository;
    }

    public function get()
    {
        return $this->serviceRepository->get();
    }

    public function getById($id)
    {
        return $this->serviceRepository->getById($id);
    }

}
