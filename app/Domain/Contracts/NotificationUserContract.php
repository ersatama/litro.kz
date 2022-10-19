<?php

namespace App\Domain\Contracts;

class NotificationUserContract extends Contract
{
    const TABLE =   'notification_users';
    const FILLABLE  =   [
        self::USER_ID,
        self::TITLE,
        self::TITLE_EN,
        self::TITLE_KZ,
        self::DESCRIPTION,
        self::DESCRIPTION_EN,
        self::DESCRIPTION_KZ,
        self::VIEWS
    ];
}
