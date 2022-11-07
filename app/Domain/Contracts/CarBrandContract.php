<?php

namespace App\Domain\Contracts;

class CarBrandContract extends Contract
{
    const TABLE =   'car_brands';
    const FILLABLE  =   [
        self::TITLE,
    ];
}
