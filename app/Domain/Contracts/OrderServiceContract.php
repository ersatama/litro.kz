<?php

namespace App\Domain\Contracts;

class OrderServiceContract extends MainContract
{
    const TABLE =   'order_services';
    const FILLABLE  =   [
        self::MASTER_ID,
        self::USER_ID,
        self::ORDER_CARD_ID,
        self::BITRIX_ID,
        self::PLACE_ID,
        self::CITY_ID,
        self::PAYBOX_ORDER_ID,
        self::PAYBOX_ORDER_DATE,
        self::PRICE,
        self::OLD_PRICE,
        self::PAYMENT_TYPE,
        self::PAYMENT_METHOD,
        self::ADDRESS,
        self::LAT,
        self::LONG,
        self::REVIEW,
        self::RANK,
        self::NAME,
        self::PHONE,
        self::STATUS,
        self::IS_PAID,
        self::IS_CARD,
        self::IS_CANCELED,
        self::UTM_CAMPAIGN,
    ];
}
