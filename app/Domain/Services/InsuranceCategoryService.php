<?php

namespace App\Domain\Services;

use App\Domain\Repositories\InsuranceCategory\InsuranceCategoryRepositoryInterface;

class InsuranceCategoryService extends MainService
{
    public InsuranceCategoryRepositoryInterface $insuranceCategoryRepository;
    public function __construct(InsuranceCategoryRepositoryInterface $insuranceCategoryRepository)
    {
        $this->insuranceCategoryRepository  =   $insuranceCategoryRepository;
    }
}
