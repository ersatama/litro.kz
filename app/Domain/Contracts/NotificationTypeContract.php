<?php

namespace App\Domain\Contracts;

class NotificationTypeContract extends Contract
{
    const TABLE =   'notification_types';
    const FILLABLE  =   [
        self::TITLE,
        self::TITLE_EN,
        self::TITLE_KZ,
        self::IMAGE_ID
    ];
}
