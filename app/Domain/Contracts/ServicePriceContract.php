<?php

namespace App\Domain\Contracts;

class ServicePriceContract extends Contract
{
    const TABLE =   'service_prices';
    const FILLABLE  =   [
        self::CITY_ID,
        self::SERVICE_ID,
        self::CAR_CATEGORY_ID,
        self::PRICE,
        self::IS_FREE,
        self::IS_WITH_CHECK,
        self::IS_NEGOTIABLE_PRICE
    ];
}
