<?php

namespace App\Domain\Contracts;

abstract class ErrorContract extends Contract
{
    const ERROR_NOT_FOUND   =   [
        self::MESSAGE   =>  self::NOT_FOUND
    ];
    const FAILED_AUTH    =   [
        self::MESSAGE   =>  self::INCORRECT_PHONE_OR_PASSWORD
    ];
    const INCORRECT_CODE    =   [
        self::MESSAGE   =>  self::CODE_DOES_NOT_MATCH
    ];
}
