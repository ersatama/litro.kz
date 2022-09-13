<?php

namespace App\Domain\Services;

use App\Domain\Repositories\InsuranceSelect\InsuranceSelectRepositoryInterface;

class InsuranceSelectService extends MainService
{
    public InsuranceSelectRepositoryInterface $insuranceSelectRepository;
    public function __construct(InsuranceSelectRepositoryInterface $insuranceSelectRepository)
    {
        $this->insuranceSelectRepository    =   $insuranceSelectRepository;
    }
}
