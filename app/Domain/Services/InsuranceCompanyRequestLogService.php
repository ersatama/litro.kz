<?php

namespace App\Domain\Services;

use App\Domain\Repositories\InsuranceCompanyRequestLog\InsuranceCompanyRequestLogRepositoryInterface;

class InsuranceCompanyRequestLogService extends MainService
{
    public InsuranceCompanyRequestLogRepositoryInterface $insuranceCompanyRequestLogRepository;
    public function __construct(InsuranceCompanyRequestLogRepositoryInterface $insuranceCompanyRequestLogRepository)
    {
        $this->insuranceCompanyRequestLogRepository =   $insuranceCompanyRequestLogRepository;
    }
}
