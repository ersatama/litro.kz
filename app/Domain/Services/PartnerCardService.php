<?php

namespace App\Domain\Services;

use App\Domain\Repositories\PartnerCard\PartnerCardRepositoryInterface;

class PartnerCardService extends MainService
{
    public PartnerCardRepositoryInterface $partnerCardRepository;
    public function __construct(PartnerCardRepositoryInterface $partnerCardRepository)
    {
        $this->partnerCardRepository    =   $partnerCardRepository;
    }
}
