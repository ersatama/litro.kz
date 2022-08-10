<?php

namespace App\Domain\Contracts;

class CityContract extends MainContract
{
    const TABLE =   'cities';
    const FILLABLE  =   [
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN,
        self::REGION_ID,
        self::IS_ACTIVE,
        self::LAT,
        self::LONG,
    ];
}
