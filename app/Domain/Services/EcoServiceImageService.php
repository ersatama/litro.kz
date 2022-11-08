<?php

namespace App\Domain\Services;

use App\Domain\Repositories\EcoServiceImage\EcoServiceImageRepositoryInterface;

class EcoServiceImageService extends MainService
{
    public EcoServiceImageRepositoryInterface $ecoServiceImageRepository;
    public function __construct(EcoServiceImageRepositoryInterface $ecoServiceImageRepository)
    {
        $this->ecoServiceImageRepository    =   $ecoServiceImageRepository;
    }
}
