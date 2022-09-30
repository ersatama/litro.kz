<?php

namespace App\Domain\Contracts;

class SPartnerPointWalletContract extends Contract
{
    const TABLE =   's_partner_point_wallets';
    const FILLABLE  =   [
        self::S_PARTNER_POINT_ID,
        self::CURRENCY_ID,
        self::BALANCE
    ];
}
