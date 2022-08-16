<?php

namespace App\Domain\Contracts;

class ImageContract extends MainContract
{
    const TABLE =   'images';
    const FILLABLE  =   [
        self::USER_ID,
        self::PNG,
        self::WEBP,
        self::JPG,
    ];
}
