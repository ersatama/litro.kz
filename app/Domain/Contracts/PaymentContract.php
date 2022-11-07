<?php

namespace App\Domain\Contracts;

class PaymentContract extends Contract
{
    const TABLE =   'payments';
    const FILLABLE  =   [
        self::USER_ID,
        self::SUM,
        self::CURRENCY_ID,
        self::STATUS,
        self::PAYMENT_SYSTEM_INFO,
        self::PAYMENT_SYSTEM_ID,
        self::PAYMENT_TYPE,
        self::PAYMENT_ID,
        self::PAYMENT_KEY,
    ];
}
