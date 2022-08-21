<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Region\RegionRepositoryInterface;

class RegionService extends MainService
{
    public RegionRepositoryInterface $regionRepository;
    public function __construct(RegionRepositoryInterface $regionRepository)
    {
        $this->regionRepository =   $regionRepository;
    }
}
