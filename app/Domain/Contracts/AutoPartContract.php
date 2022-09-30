<?php

namespace App\Domain\Contracts;

class AutoPartContract extends Contract
{
    const TABLE =   'auto_parts';
    const FILLABLE  =   [
        self::IMAGE_ID,
        self::AUTO_PART_CATEGORY_ID,
        self::SUPPLIER_ID,
        self::PRICE,
        self::UNIVERSAL
    ];
}
