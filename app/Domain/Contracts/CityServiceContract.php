<?php

namespace App\Domain\Contracts;

class CityServiceContract extends MainContract
{
    const TABLE =   'city_services';
    const FILLABLE  =   [
        self::CITY_ID,
        self::SERVICE_ID,
        self::PRICE,
        self::IS_FREE,
        self::IS_WITH_CHECK,
        self::IS_NEGOTIABLE_PRICE
    ];
}
