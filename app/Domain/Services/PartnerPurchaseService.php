<?php

namespace App\Domain\Services;

use App\Domain\Repositories\PartnerPurchase\PartnerPurchaseRepositoryInterface;

class PartnerPurchaseService extends MainService
{
    public PartnerPurchaseRepositoryInterface $partnerPurchaseRepository;
    public function __construct(PartnerPurchaseRepositoryInterface $partnerPurchaseRepository)
    {
        $this->partnerPurchaseRepository    =   $partnerPurchaseRepository;
    }
}
