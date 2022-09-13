<?php

namespace App\Domain\Services;

use App\Domain\Repositories\InsuranceSelectOption\InsuranceSelectOptionRepositoryInterface;

class InsuranceSelectOptionService extends MainService
{
    public InsuranceSelectOptionRepositoryInterface $insuranceSelectOptionRepository;
    public function __construct(InsuranceSelectOptionRepositoryInterface $insuranceSelectOptionRepository)
    {
        $this->insuranceSelectOptionRepository  =   $insuranceSelectOptionRepository;
    }
}
