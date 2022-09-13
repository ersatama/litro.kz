<?php

namespace App\Domain\Contracts;

class SPartnerPointWalletContract extends MainContract
{
    const TABLE =   's_partner_point_wallets';
    const FILLABLE  =   [
        self::S_PARTNER_POINT_ID,
        self::CURRENCY_ID,
        self::BALANCE
    ];
}
