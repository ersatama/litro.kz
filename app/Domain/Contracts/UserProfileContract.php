<?php

namespace App\Domain\Contracts;

class UserProfileContract extends Contract
{
    const TABLE =   'user_profiles';
    const FILLABLE  =   [
        self::USER_ID,
        self::PARENT_ID,
        self::IMAGE_ID,
        self::FIRST_NAME,
        self::MIDDLE_NAME,
        self::LAST_NAME,
        self::LOCALE,
        self::GENDER,
        self::DESCRIPTION,
        self::DISCOUNT,
        self::BONUS,
        self::REFERRAL_CODE,
        self::BALANCE,
        self::RANK,
    ];
}
