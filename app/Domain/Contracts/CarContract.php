<?php

namespace App\Domain\Contracts;

class CarContract extends MainContract
{
    const TABLE =   'cars';
    const FILLABLE  =   [
        self::CAR_MODEL_ID,
        self::YEAR,
        self::CAR_NUMBER,
        self::ORDER_CARD_ID,
        self::VIN
    ];
}
