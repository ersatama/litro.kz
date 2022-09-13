<?php

namespace App\Domain\Services;

use App\Domain\Repositories\LawyerContact\LawyerContactRepositoryInterface;

class LawyerContactService extends MainService
{
    public LawyerContactRepositoryInterface $lawyerContactRepository;
    public function __construct(LawyerContactRepositoryInterface $lawyerContactRepository)
    {
        $this->lawyerContactRepository  =   $lawyerContactRepository;
    }
}
