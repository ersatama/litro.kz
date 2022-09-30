<?php

namespace App\Domain\Contracts;

class CardContract extends Contract
{
    const TABLE =   'cards';
    const FILLABLE  =   [
        self::IMAGE_ID,
        self::CARD_CATEGORY_ID,
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN,
        self::DESCRIPTION,
        self::DESCRIPTION_KZ,
        self::DESCRIPTION_EN,
        self::DETAIL,
        self::DETAIL_KZ,
        self::DETAIL_EN,
        self::PRICE,
        self::RANK,
        self::ALLOWED_DRIVERS,
        self::ALLOWED_CARS,
        self::IS_ACTIVE,
        self::CLIENT_DISCOUNT,
        self::PRICE_MONTHLY,
        self::PRICE_MONTHLY_FIRST_MONTH,
        self::REFERRAL_PRICE_MONTHLY,
        self::REFERRAL_PRICE_MONTHLY_FIRST_MONTH,
        self::IS_FOR_CORPORATE_USE,
        self::ICON,
        self::ICON_SELECTED,
        self::IMG,
        self::COLORS,
    ];
}
