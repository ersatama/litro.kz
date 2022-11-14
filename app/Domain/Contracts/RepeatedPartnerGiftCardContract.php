<?php

namespace App\Domain\Contracts;

class RepeatedPartnerGiftCardContract extends Contract
{
    const TABLE =   'repeated_partner_gift_cards';
    const FILLABLE  =   [
        self::CARD_ID,
        self::PARTNER_ID,
        self::PHONE,
    ];
}
