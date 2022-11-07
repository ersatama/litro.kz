<?php

namespace App\Domain\Contracts;

class AutoPartImageContract extends Contract
{
    const TABLE =   'auto_part_images';
    const FILLABLE  =   [
        self::AUTO_PART_ID,
        self::IMAGE_ID,
    ];
}
