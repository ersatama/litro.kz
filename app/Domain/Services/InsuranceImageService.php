<?php

namespace App\Domain\Services;

use App\Domain\Repositories\InsuranceImage\InsuranceImageRepositoryInterface;

class InsuranceImageService extends MainService
{
    public InsuranceImageRepositoryInterface $insuranceImageRepository;
    public function __construct(InsuranceImageRepositoryInterface $insuranceImageRepository)
    {
        $this->insuranceImageRepository =   $insuranceImageRepository;
    }
}
