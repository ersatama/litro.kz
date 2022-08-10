<?php

namespace App\Domain\Contracts;

class CarModelContract extends MainContract
{
    const TABLE =   'car_models';
    const FILLABLE  =   [
        self::CAR_BRAND_ID,
        self::TITLE,
    ];
}
