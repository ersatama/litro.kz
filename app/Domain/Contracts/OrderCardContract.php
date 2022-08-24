<?php

namespace App\Domain\Contracts;

class OrderCardContract extends MainContract
{
    const TABLE =   'order_cards';
    const FILLABLE  =   [
        self::CARD_ID,
        self::USER_ID,
        self::BITRIX_ID,
        self::SYNCED,
        self::PRICE,
        self::START_DATE,
        self::END_DATE,
        self::NUMBER,
        self::PAYMENT_TYPE,
        self::PAYBOX_ORDER_ID,
        self::PAYBOX_ORDER_DATE,
        self::STATUS,
        self::REFERRAL,
        self::RECURRENT_ENABLED,
        self::IS_PAYED,
        self::IS_CANCELED,
        self::MONTHLY,
        self::IS_FROM_EXCEL,
        self::ACTIVATE_DATE,
        self::PAYMENT_METHOD,
        self::UTM_CAMPAIGN,
        self::IMPORT_ID,
    ];
}
