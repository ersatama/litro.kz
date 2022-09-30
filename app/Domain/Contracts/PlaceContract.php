<?php

namespace App\Domain\Contracts;

class PlaceContract extends Contract
{
    const TABLE =   'places';
    const FILLABLE  =   [
        self::SERVICE_ID,
        self::CITY_ID,
        self::LAT,
        self::LONG,
        self::ADDRESS,
        self::TITLE,
    ];
}
