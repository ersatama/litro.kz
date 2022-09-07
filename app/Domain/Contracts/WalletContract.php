<?php

namespace App\Domain\Contracts;

class WalletContract extends MainContract
{
    const TABLE =   'wallets';
    const FILLABLE  =   [
        self::USER_ID,
        self::CURRENCY_ID,
        self::BALANCE
    ];
}
