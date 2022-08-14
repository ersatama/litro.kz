<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Region\RegionRepositoryInterface;

class RegionService
{
    protected RegionRepositoryInterface $regionRepository;
    public function __construct(RegionRepositoryInterface $regionRepository)
    {
        $this->regionRepository =   $regionRepository;
    }

    public function get($skip,$take)
    {
        return $this->regionRepository->get($skip,$take);
    }

    public function count($where)
    {
        return $this->regionRepository->count($where);
    }

}
