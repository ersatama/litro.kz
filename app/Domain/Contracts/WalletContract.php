<?php

namespace App\Domain\Contracts;

class WalletContract extends Contract
{
    const TABLE =   'wallets';
    const FILLABLE  =   [
        self::USER_ID,
        self::CURRENCY_ID,
        self::BALANCE
    ];
}
