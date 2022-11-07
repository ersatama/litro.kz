<?php

namespace App\Domain\Contracts;

class NewsContract extends Contract
{
    const TABLE =   'news';
    const FILLABLE  =   [
        self::ID,
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN,
        self::DESCRIPTION,
        self::DESCRIPTION_KZ,
        self::DESCRIPTION_EN,
        self::IMAGE_ID,
        self::NEWS_CATEGORY_ID,
        self::IS_ACTIVE,
        self::LINK
    ];
}
