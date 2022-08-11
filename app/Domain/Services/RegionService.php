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

    public function get()
    {
        return $this->regionRepository->get();
    }

}
