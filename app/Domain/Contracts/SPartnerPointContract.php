<?php

namespace App\Domain\Contracts;

class SPartnerPointContract extends Contract
{
    const TABLE =   's_partner_points';
    const FILLABLE  =   [
        self::TITLE,
        self::LEGAL_TITLE,
        self::DESCRIPTION,
        self::MANAGER_NAME,
        self::ADDRESS,
        self::CITY_ID,
        self::LAT,
        self::LONG,
        self::INFO,
        self::PHONE,
        self::EMAIL,
        self::PASSWORD,
        self::BONUS_PERCENT,
        self::DISCOUNT,
        self::SELL_CARD,
        self::ADS_AND_SELL,
        self::IMAGE_ID,
    ];
}
