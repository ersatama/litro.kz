<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Lawyer\LawyerRepositoryInterface;

class LawyerService extends MainService
{
    public LawyerRepositoryInterface $lawyerRepository;
    public function __construct(LawyerRepositoryInterface $lawyerRepository)
    {
        $this->lawyerRepository =   $lawyerRepository;
    }
}
