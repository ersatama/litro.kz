<?php

namespace App\Domain\Contracts;

class RecurrentContract extends Contract
{
    const TABLE =   'recurrents';
    const FILLABLE  =   [
        self::AMOUNT,
        self::PAYMENT_DATE,
        self::CARD_PAN,
        self::ORDER_ID,
        self::RECURRING_PROFILE_ID,
        self::NEXT_PAYMENT,
        self::RESULT,
        self::SALT
    ];
}
