<?php

namespace App\Domain\Contracts;

class CarCategoryContract extends MainContract
{
    const TABLE =   'car_categories';
    const FILLABLE  =   [
        self::IMAGE_ID,
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN
    ];
}
