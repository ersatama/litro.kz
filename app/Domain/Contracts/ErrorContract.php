<?php

namespace App\Domain\Contracts;

class ErrorContract extends MainContract
{
    const ERROR_NOT_FOUND   =   [
        self::MESSAGE  =>  self::NOT_FOUND
    ];
}
