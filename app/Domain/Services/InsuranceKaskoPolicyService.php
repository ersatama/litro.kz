<?php

namespace App\Domain\Services;

use App\Domain\Repositories\InsuranceKaskoPolicy\InsuranceKaskoPolicyRepositoryInterface;

class InsuranceKaskoPolicyService extends MainService
{
    public InsuranceKaskoPolicyRepositoryInterface $insuranceKaskoPolicyRepository;
    public function __construct(InsuranceKaskoPolicyRepositoryInterface $insuranceKaskoPolicyRepository)
    {
        $this->insuranceKaskoPolicyRepository   =   $insuranceKaskoPolicyRepository;
    }
}
