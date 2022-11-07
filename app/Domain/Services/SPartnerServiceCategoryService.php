<?php

namespace App\Domain\Services;

use App\Domain\Repositories\SPartnerServiceCategory\SPartnerServiceCategoryRepositoryInterface;

class SPartnerServiceCategoryService extends MainService
{
    public SPartnerServiceCategoryRepositoryInterface $SPartnerServiceCategoryRepository;
    public function __construct(SPartnerServiceCategoryRepositoryInterface $SPartnerServiceCategoryRepository)
    {
        $this->SPartnerServiceCategoryRepository    =   $SPartnerServiceCategoryRepository;
    }
}
