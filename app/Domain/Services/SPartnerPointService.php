<?php

namespace App\Domain\Services;

use App\Domain\Repositories\SPartnerPoint\SPartnerPointRepositoryInterface;

class SPartnerPointService extends MainService
{
    public SPartnerPointRepositoryInterface $SPartnerPointRepository;
    public function __construct(SPartnerPointRepositoryInterface $SPartnerPointRepository)
    {
        $this->SPartnerPointRepository  =   $SPartnerPointRepository;
    }
}
