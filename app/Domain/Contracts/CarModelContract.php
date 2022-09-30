<?php

namespace App\Domain\Contracts;

class CarModelContract extends Contract
{
    const TABLE =   'car_models';
    const FILLABLE  =   [
        self::CAR_BRAND_ID,
        self::TITLE,
    ];
}
