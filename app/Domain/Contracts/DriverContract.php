<?php

namespace App\Domain\Contracts;

class DriverContract extends Contract
{
    const TABLE =   'drivers';
    const FILLABLE  =   [
        self::FIRST_NAME,
        self::LAST_NAME,
        self::PATRONYMIC,
        self::REFERRAL_CODE,
        self::ORDER_CARD_ID,
        self::PHONE,
    ];
}
