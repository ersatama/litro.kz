<?php

namespace App\Domain\Contracts;

class ServiceTypeContract extends MainContract
{
    const TABLE =   'service_types';
    const FILLABLE  =   [
        self::TITLE,
        self::TITLE_EN,
        self::TITLE_KZ,
        self::POSITION,
        self::CATEGORY_ID
    ];
}
