<?php

namespace App\Domain\Contracts;

class CodeContract extends Contract
{
    const TABLE =   'codes';
    const FILLABLE  =   [
        self::PHONE,
        self::EMAIL,
        self::CODE,
        self::STATUS,
    ];
}
