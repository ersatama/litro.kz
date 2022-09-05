<?php

namespace App\Domain\Contracts;

class UserCarContract extends MainContract
{
    const TABLE =   'user_cars';
    const FILLABLE  =   [
        self::USER_ID,
        self::CAR_BRAND_ID,
        self::CAR_MODEL_ID,
        self::YEAR,
        self::REGISTRATION_CERTIFICATE,
        self::CAR_NUMBER,
        self::VIN,
    ];
}
