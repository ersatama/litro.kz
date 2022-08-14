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

    public function count($where)
    {
        return $this->serviceRepository->count($where);
    }

    public function get($skip,$take)
    {
        return $this->serviceRepository->get($skip,$take);
    }

    public function getById($id)
    {
        return $this->serviceRepository->getById($id);
    }

}
