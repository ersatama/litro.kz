<?php

namespace App\Domain\Contracts;

class CarCategoryContract extends Contract
{
    const TABLE =   'car_categories';
    const FILLABLE  =   [
        self::IMAGE_ID,
        self::POSITION,
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN,
    ];
}
