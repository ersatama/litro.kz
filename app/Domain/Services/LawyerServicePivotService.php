<?php

namespace App\Domain\Services;

use App\Domain\Repositories\LawyerServicePivot\LawyerServicePivotRepositoryInterface;

class LawyerServicePivotService extends MainService
{
    public LawyerServicePivotRepositoryInterface $lawyerServicePivotRepository;
    public function __construct(LawyerServicePivotRepositoryInterface $lawyerServicePivotRepository)
    {
        $this->lawyerServicePivotRepository =   $lawyerServicePivotRepository;
    }
}
