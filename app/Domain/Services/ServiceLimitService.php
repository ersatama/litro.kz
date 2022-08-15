<?php

namespace App\Domain\Services;

use App\Domain\Repositories\ServiceLimit\ServiceLimitRepositoryInterface;

class ServiceLimitService
{
    protected ServiceLimitRepositoryInterface $serviceLimitRepository;
    public function __construct(ServiceLimitRepositoryInterface $serviceLimitRepository)
    {
        $this->serviceLimitRepository   =   $serviceLimitRepository;
    }

    public function get($skip,$take)
    {
        return $this->serviceLimitRepository->get($skip,$take);
    }

    public function count($where)
    {
        return $this->serviceLimitRepository->count($where);
    }

    public function getById($id)
    {
        return $this->serviceLimitRepository->getById($id);
    }

}
