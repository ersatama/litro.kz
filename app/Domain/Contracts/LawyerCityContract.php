<?php

namespace App\Domain\Contracts;

class LawyerCityContract extends MainContract
{
    const TABLE =   'lawyer_cities';
    const FILLABLE  =   [
        self::LAWYER_ID,
        self::CITY_ID
    ];
}
