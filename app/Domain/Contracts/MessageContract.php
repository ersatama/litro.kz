<?php

namespace App\Domain\Contracts;

class MessageContract extends Contract
{
    const TABLE =   'messages';
    const FILLABLE  =   [
        self::FULLNAME,
        self::EMAIL,
        self::PHONE,
        self::TEXT
    ];
}
