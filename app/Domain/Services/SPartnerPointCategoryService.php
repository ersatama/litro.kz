<?php

namespace App\Domain\Services;

use App\Domain\Repositories\SPartnerPointCategory\SPartnerPointCategoryRepositoryInterface;

class SPartnerPointCategoryService extends MainService
{
    public SPartnerPointCategoryRepositoryInterface $SPartnerPointCategoryRepository;
    public function __construct(SPartnerPointCategoryRepositoryInterface $SPartnerPointCategoryRepository)
    {
        $this->SPartnerPointCategoryRepository  =   $SPartnerPointCategoryRepository;
    }
}
