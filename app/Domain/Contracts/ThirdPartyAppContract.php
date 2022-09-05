<?php

namespace App\Domain\Contracts;

class ThirdPartyAppContract extends MainContract
{
    const TABLE =   'third_party_apps';
    const FILLABLE  =   [
        self::KEY,
        self::NAME,
        self::PASSWORD
    ];
}
