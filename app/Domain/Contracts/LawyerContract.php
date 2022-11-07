<?php

namespace App\Domain\Contracts;

class LawyerContract extends Contract
{
    const TABLE =   'lawyers';
    const FILLABLE  =   [
        self::IMAGE_ID,
        self::NAME
    ];
}
