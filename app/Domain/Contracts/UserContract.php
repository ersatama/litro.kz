<?php

namespace App\Domain\Contracts;

class UserContract extends Contract
{
    const TABLE =   'users';

    const FILLABLE  =   [
        self::ROLE_ID,
        self::CITY_ID,
        self::BITRIX_ID,
        self::PHONE,
        self::EMAIL,
        self::IIN,
        self::FIRST_NAME,
        self::LAST_NAME,
        self::PATRONYMIC,
        self::BIRTHDATE,
        self::PASSWORD,
        self::IS_BLOCKED,
        self::GENDER,
        self::IS_VLIFE_USER,
        self::VLIFE_USER_ID,
        self::PROMO_CODE,
        self::BONUS,
        self::ANDROID,
        self::IOS,
    ];

    const HIDDEN    =   [
        self::PASSWORD
    ];

    const SEARCH    =   [
        self::ID,
        self::FIRST_NAME,
        self::LAST_NAME,
    ];
}
