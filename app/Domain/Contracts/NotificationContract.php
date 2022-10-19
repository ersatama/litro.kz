<?php

namespace App\Domain\Contracts;

class NotificationContract extends Contract
{
    const TABLE =   'notifications';
    const FILLABLE  =   [
        self::CITY_ID,
        self::TITLE,
        self::TITLE_EN,
        self::TITLE_KZ,
        self::DESCRIPTION,
        self::DESCRIPTION_EN,
        self::DESCRIPTION_KZ,
        self::VIEWS
    ];
}
