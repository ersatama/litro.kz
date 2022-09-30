<?php

namespace App\Domain\Contracts;

class MoneyOperationContract extends Contract
{
    const TABLE =   'money_operations';
    const FILLABLE  =   [
        self::MONEY_OPERATION_TYPE_ID,
        self::USER_ID,
        self::WALLET_RECORD_ID,
        self::PAYMENT_ID,
        self::STATUS,
    ];
}
