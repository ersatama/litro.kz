<?php

namespace App\Domain\Contracts;

abstract class ErrorContract extends MainContract
{
    const ERROR_NOT_FOUND   =   [
        self::MESSAGE   =>  self::NOT_FOUND
    ];
    const INCORRECT_CODE    =   [
        self::MESSAGE   =>  self::CODE_DOES_NOT_MATCH
    ];
}
