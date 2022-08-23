<?php

namespace App\Domain\Contracts;

class GiftContract extends MainContract
{
    const TABLE =   'gifts';
    const FILLABLE  =   [
        self::USER_ID,
        self::NUMBER,
        self::IS_PAYED,
        self::PAYBOX_ORDER_ID,
        self::PAYBOX_ORDER_DATE,
        self::ACTIVATED_BY,
        self::CARD_ID,
        self::PRICE,
        self::PROMO_CODE,
        self::PHONE
    ];
}
