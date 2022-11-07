<?php

namespace App\Domain\Services;

use App\Domain\Repositories\SPartnerReceivedService\SPartnerReceivedServiceRepositoryInterface;

class SPartnerReceivedServiceService extends MainService
{
    public SPartnerReceivedServiceRepositoryInterface $SPartnerReceivedServiceRepository;
    public function __construct(SPartnerReceivedServiceRepositoryInterface $SPartnerReceivedServiceRepository)
    {
        $this->SPartnerReceivedServiceRepository    =   $SPartnerReceivedServiceRepository;
    }
}
