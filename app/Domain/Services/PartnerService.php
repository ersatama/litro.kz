<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Partner\PartnerRepositoryInterface;

class PartnerService extends MainService
{
    public PartnerRepositoryInterface $partnerRepository;
    public function __construct(PartnerRepositoryInterface $partnerRepository)
    {
        $this->partnerRepository    =   $partnerRepository;
    }
}
