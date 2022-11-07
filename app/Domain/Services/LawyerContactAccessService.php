<?php

namespace App\Domain\Services;

use App\Domain\Repositories\LawyerContactAccess\LawyerContactAccessRepositoryInterface;

class LawyerContactAccessService extends MainService
{
    public LawyerContactAccessRepositoryInterface $lawyerContactAccessRepository;
    public function __construct(LawyerContactAccessRepositoryInterface $lawyerContactAccessRepository)
    {
        $this->lawyerContactAccessRepository    =   $lawyerContactAccessRepository;
    }
}
