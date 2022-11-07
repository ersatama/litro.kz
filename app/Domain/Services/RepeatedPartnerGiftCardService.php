<?php

namespace App\Domain\Services;

use App\Domain\Repositories\RepeatedPartnerGiftCard\RepeatedPartnerGiftCardRepositoryInterface;

class RepeatedPartnerGiftCardService extends MainService
{
    public RepeatedPartnerGiftCardRepositoryInterface $repeatedPartnerGiftCardRepository;
    public function __construct(RepeatedPartnerGiftCardRepositoryInterface $repeatedPartnerGiftCardRepository)
    {
        $this->repeatedPartnerGiftCardRepository    =   $repeatedPartnerGiftCardRepository;
    }
}
