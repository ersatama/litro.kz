<?php

namespace App\Domain\Services;

use App\Domain\Repositories\InsuranceCompany\InsuranceCompanyRepositoryInterface;

class InsuranceCompanyService extends MainService
{
    public InsuranceCompanyRepositoryInterface $insuranceCompanyRepository;
    public function __construct(InsuranceCompanyRepositoryInterface $insuranceCompanyRepository)
    {
        $this->insuranceCompanyRepository   =   $insuranceCompanyRepository;
    }
}
