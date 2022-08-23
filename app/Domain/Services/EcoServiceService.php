<?php

namespace App\Domain\Services;

use App\Domain\Repositories\EcoService\EcoServiceRepositoryInterface;

class EcoServiceService extends MainService
{
    public EcoServiceRepositoryInterface $ecoServiceRepository;
    public function __construct(EcoServiceRepositoryInterface $ecoServiceRepository)
    {
        $this->ecoServiceRepository =   $ecoServiceRepository;
    }
}
