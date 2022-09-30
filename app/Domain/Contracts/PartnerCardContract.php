<?php

namespace App\Domain\Contracts;

class PartnerCardContract extends Contract
{
    const TABLE =   'partner_cards';
    const FILLABLE  =   [
        self::CARD_ID,
        self::PARTNER_ID,
    ];
}
