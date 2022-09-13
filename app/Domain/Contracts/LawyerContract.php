<?php

namespace App\Domain\Contracts;

class LawyerContract extends MainContract
{
    const TABLE =   'lawyers';
    const FILLABLE  =   [
        self::IMAGE_ID,
        self::NAME
    ];
}
