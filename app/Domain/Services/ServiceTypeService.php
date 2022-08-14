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

    public function count($where)
    {
        return $this->serviceTypeRepository->count($where);
    }

    public function get($skip,$take)
    {
        return $this->serviceTypeRepository->get($skip,$take);
    }

    public function getById($id)
    {
        return $this->serviceTypeRepository->getById($id);
    }

}
