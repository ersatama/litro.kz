<?php

namespace App\Domain\Contracts;

class ThirdPartyAppContract extends Contract
{
    const TABLE =   'third_party_apps';
    const FILLABLE  =   [
        self::KEY,
        self::NAME,
        self::PASSWORD
    ];
}
