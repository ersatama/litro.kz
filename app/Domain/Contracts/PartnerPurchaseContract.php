<?php

namespace App\Domain\Contracts;

class PartnerPurchaseContract extends Contract
{
    const TABLE =   'partner_purchases';
    const FILLABLE  =   [
        self::PARTNER_ID,
        self::PURCHASE_ID,
        self::PURCHASE_DATE,
        self::PHONE,
    ];
}
