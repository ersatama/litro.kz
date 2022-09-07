<?php

namespace App\Domain\Contracts;

class WalletRecordContract extends MainContract
{
    const TABLE =   'wallet_records';
    const FILLABLE  =   [
        self::PAYMENT_ID,
        self::WALLET_ID,
        self::CURRENCY_ID,
        self::AMOUNT,
        self::PREVIOUS_BALANCE,
        self::TYPE,
        self::STATUS
    ];
}
