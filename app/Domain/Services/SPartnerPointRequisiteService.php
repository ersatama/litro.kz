<?php

namespace App\Domain\Services;

use App\Domain\Repositories\SPartnerPointRequisite\SPartnerPointRequisiteRepositoryInterface;

class SPartnerPointRequisiteService extends MainService
{
    public SPartnerPointRequisiteRepositoryInterface $SPartnerPointRequisiteRepository;
    public function __construct(SPartnerPointRequisiteRepositoryInterface $SPartnerPointRequisiteRepository)
    {
        $this->SPartnerPointRequisiteRepository =   $SPartnerPointRequisiteRepository;
    }
}
