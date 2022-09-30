<?php

namespace App\Domain\Contracts;

class CarContract extends Contract
{
    const TABLE =   'cars';
    const FILLABLE  =   [
        self::ORDER_CARD_ID,
        self::CAR_MODEL_ID,
        self::YEAR,
        self::CAR_NUMBER,
        self::VIN
    ];
}
