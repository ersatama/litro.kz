<?php

namespace App\Domain\Services;

use App\Domain\Repositories\InsuranceCompanyProduct\InsuranceCompanyProductRepositoryInterface;

class InsuranceCompanyProductService extends MainService
{
    public InsuranceCompanyProductRepositoryInterface $insuranceCompanyProductRepository;
    public function __construct(InsuranceCompanyProductRepositoryInterface $insuranceCompanyProductRepository)
    {
        $this->insuranceCompanyProductRepository    =   $insuranceCompanyProductRepository;
    }
}
