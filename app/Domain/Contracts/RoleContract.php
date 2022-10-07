<?php

namespace App\Domain\Contracts;

class RoleContract extends Contract
{
    const TABLE =   'roles';
    const FILLABLE  =   [
        self::NAME
    ];
}
