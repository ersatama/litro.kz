<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Driver\DriverRepositoryInterface;

class DriverService extends MainService
{
    public DriverRepositoryInterface $driverRepository;
    public function __construct(DriverRepositoryInterface $driverRepository)
    {
        $this->driverRepository =   $driverRepository;
    }
}
