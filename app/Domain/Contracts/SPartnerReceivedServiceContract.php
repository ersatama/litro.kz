<?php

namespace App\Domain\Contracts;

class SPartnerReceivedServiceContract extends MainContract
{
    const TABLE =   's_partner_received_services';
    const FILLABLE  =   [
        self::USER_ID,
        self::S_PARTNER_POINT_ID,
        self::CURRENCY_ID,
        self::PRICE,
        self::IS_PAID,
        self::STATUS,
        self::SUM_FROM_WALLET,
        self::SUM_FROM_BANK_CARD
    ];
}
