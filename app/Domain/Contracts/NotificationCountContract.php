<?php

namespace App\Domain\Contracts;

class NotificationCountContract extends Contract
{
    const TABLE =   'notification_counts';
    const FILLABLE  =   [
        self::USER_ID,
        self::NOTIFICATION_ID,
    ];
}
