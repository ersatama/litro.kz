<?php

namespace App\Domain\Contracts;

class AutoPartTypeContract extends Contract
{
    const TABLE =   'auto_part_types';
    const FILLABLE  =   [
        self::FILTER,
    ];
}
