<?php

namespace App\Domain\Services;

use App\Domain\Repositories\LawyerService\LawyerServiceRepositoryInterface;

class LawyerServiceService extends MainService
{
    public LawyerServiceRepositoryInterface $lawyerServiceRepository;
    public function __construct(LawyerServiceRepositoryInterface $lawyerServiceRepository)
    {
        $this->lawyerServiceRepository  =   $lawyerServiceRepository;
    }
}
