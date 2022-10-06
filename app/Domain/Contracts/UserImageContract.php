<?php

namespace App\Domain\Contracts;

class UserImageContract extends Contract
{
    const TABLE =   'user_images';
    const FILLABLE  =   [
        self::USER_ID,
        self::IMAGE_ID,
    ];
}
