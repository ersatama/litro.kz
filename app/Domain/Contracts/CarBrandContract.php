<?php

namespace App\Domain\Contracts;

class CarBrandContract extends MainContract
{
    const TABLE =   'car_brands';
    const FILLABLE  =   [
        self::TITLE,
    ];
}
