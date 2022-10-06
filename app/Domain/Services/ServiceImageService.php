<?php

namespace App\Domain\Services;

use App\Domain\Repositories\ServiceImage\ServiceImageRepositoryInterface;

class ServiceImageService extends MainService
{
    public ServiceImageRepositoryInterface $serviceImageRepository;
    public function __construct(ServiceImageRepositoryInterface $serviceImageRepository)
    {
        $this->serviceImageRepository   =   $serviceImageRepository;
    }
}
